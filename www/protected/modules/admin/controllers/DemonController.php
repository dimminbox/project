<?php

class DemonController extends AdminController
{

    //const DEPOSIT_START_TIME = 172800;
    const DEPOSIT_START_TIME = 0;
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionDeposit($key=null) {

        if ( $key != null && $key == Yii::app()->params['CronSecretPhrase']) {

            $users = User::model()->findAll();


            foreach( $users as $user ) {
                if ( isset($user->deposit) ) {
                    $deposits = Deposit::model()->findAllByAttributes(array('user_id' => $user->id));
                    $summ = 0;
                    foreach( $deposits as $deposit ) {

                        if ( $deposit->status == 1 && $deposit->expire > date('Y-m-d H:i:s', time()) ) {

                            if ( $deposit->status == 1 && $deposit->date < date('Y-m-d H:i:s', time() - self::DEPOSIT_START_TIME)) {
                                $depositType = DepositType::model()->findByPk($deposit->deposit_type_id);

                                $percentAmount = ( $deposit->deposit_amount * Deposit::findTodayGeneralPercent() ) * $depositType->percent;

                                $transaction = new UserTransaction();
                                $transaction->user_id = $user->id;
                                $transaction->amount = $percentAmount;
                                $transaction->amount_type = UserTransaction::AMOUNT_TYPE_EARNINGS;
                                $transaction->reason = Yii::t('demon', 'Profit of deposits');
                                $transaction->save();
                                $summ += $percentAmount;

                            } else {
                                continue;
                            }
                        } else {
                            if ( $deposit->status == 1 ) {
                                $deposit->status = 0;
                                $deposit->save();

                                $transaction = new UserTransaction();
                                $transaction->user_id = $user->id;
                                $transaction->amount = $deposit->deposit_amount;
                                $transaction->amount_type = UserTransaction::AMOUNT_TYPE_BACK_INVESTMENT;
                                $transaction->reason = Yii::t('demon', 'Refund of a deposit №') . $deposit->id;
                                $transaction->save();
                            }
                        }
                    }
                    if ( $summ > 0 ) {
                        $message = 'Esteemed ' . $user->profile->first_name . '! Percents from the deposit are received on your account in sum $' . $summ;
                        Sms::send($user->phone, $message);
                    }

                } else {
                    continue;
                }
            }

        } else {
            throw new CHttpException(404);
        }
    }

    public function actionReferral($key=null) {

        if ( $key != null && $key == Yii::app()->params['CronSecretPhrase']) {

            $users = User::model()->findAll();

            foreach( $users as $user ) {
                if ( isset($user->refs) ) {
                    $countSumm = 0;
                    foreach( $user->refs as $referral ) {
                        $referral = User::model()->findByPk($referral->user->id);
                        $summ = 0;
                        if ( isset($referral->deposit) ) {
                            $result = Yii::app()->db->createCommand("
                            SELECT SUM(amount)
                            AS amount
                            FROM " . UserTransaction::model()->tableName() . "
                            WHERE user_id=". $referral->id ."
                            AND amount_type=" . UserTransaction::AMOUNT_TYPE_EARNINGS . "
                            AND time >= CURDATE()
                            ")->queryScalar();
                        $summ += $result;
                        }

                        if ( $summ > 0 ) {

                            $transaction = new UserTransaction();
                            $transaction->amount = $summ * Referral::REFERRAL_PERCENT;
                            $transaction->amount_type = UserTransaction::AMOUNT_TYPE_REFERRAL;
                            $transaction->user_id = $user->id;
                            $transaction->reason = Yii::t('demon', 'Profit referral of') . ' ' . $referral->username;
                            $transaction->save();

                        } else {
                            continue;
                        }
                        $countSumm +=$summ;
                    }

                    if ( $countSumm > 0 ) {
                        $message = 'Esteemed ' . $user->profile->first_name . '! Referral percents are received on your account in sum $' . $summ;
                        Sms::send($user->phone, $message);
                    }

                } else {
                    continue;
                }
            }
        } else {
            throw new CHttpException(404);
        }

    }
}