<?php

class DemonController extends AdminController
{
    const GLOBAL_PERCENT = 0.01;

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
                    if ( $deposit->status == 1 ) {
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
                }
            } else {
                continue;
            }
        }
    }
}