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
                        $message = '$' . $summ;
                        Sms::send($user->profile->telefone, $message);
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