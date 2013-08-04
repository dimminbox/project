<?php

class DemonController extends AdminController
{
    const GLOBAL_PERCENT = 0.01;
    const DEPOSIT_START_TIME = 172800;
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionDeposit() {
        $users = User::model()->findAll();


        foreach( $users as $user ) {
            if ( isset($user->deposit) ) {
                $deposits = Deposit::model()->findAllByAttributes(array('user_id' => $user->id));

                foreach( $deposits as $deposit ) {

                    if ( $deposit->expire > date('Y-m-d H:i:s', time()) ) {

                        if ( $deposit->status == 1 && $deposit->date < date('Y-m-d H:i:s', time() - self::DEPOSIT_START_TIME)) {
                            $depositType = DepositType::model()->findByPk($deposit->deposit_type_id);

                            $percentAmount = ( $deposit->deposit_amount * self::GLOBAL_PERCENT ) * $depositType->percent;

                            $transaction = new UserTransaction();
                            $transaction->user_id = $user->id;
                            $transaction->amount = $percentAmount;
                            $transaction->amount_type = UserTransaction::AMOUNT_TYPE_EARNINGS;
                            $transaction->reason = 'Начисление процентов с депозита';
                            $transaction->save();


                        } else {
                            continue;
                        }
                    } else {
                        $deposit->status = 0;
                        $deposit->save();

                        $transaction = new UserTransaction();
                        $transaction->user_id = $user->id;
                        $transaction->amount = $deposit->deposit_amount;
                        $transaction->amount_type = UserTransaction::AMOUNT_TYPE_BACK_INVESTMENT;
                        $transaction->reason = 'Возврат депозита по окончании срока действия';
                        $transaction->save();
                    }
                }
            } else {
                continue;
            }
        }
    }

    public function actionReferral() {
        $users = User::model()->findAll();

        foreach( $users as $user ) {
            
        }
    }
}