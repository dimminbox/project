<?php

class DefaultController extends PrivateController
{
    const PAYEE_ACCOUNT = 'U4330448'; //* номернашего кошелька
    const PAYMENT_UNITS = 'USD';

	public function actionIndex()
	{
        $user = User::model()->findByPk(Yii::app()->user->id);

		$this->render('index', array(
            'user' => $user,
        ));
	}
    //Пополнение счета
    public function actionDeposit() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $deposit = new DepositForm();
        $deposit->PAYEE_ACCOUNT = self::PAYEE_ACCOUNT;
        $deposit->PAYEE_NAME = 'project';
        $deposit->PAYMENT_ID = uniqid(Yii::app()->user->id + time());
        $deposit->PAYMENT_UNITS = self::PAYMENT_UNITS;
        $deposit->PAYMENT_AMOUNT = 100;
        $deposit->STATUS_URL = $this->createAbsoluteUrl('/private/default/depositStatus');
        $deposit->PAYMENT_URL = $this->createAbsoluteUrl('/private/default/depositSuccess');
        $deposit->PAYMENT_URL_METHOD = 'POST';
        $deposit->NOPAYMENT_URL = $this->createAbsoluteUrl('/private/default/depositFail');
        $deposit->PAYMENT_URL_METHOD = 'POST';

        $this->render('deposit', array(
            'user' => $user,
            'deposit' => $deposit,
        ));
    }

    public function actionDepositFail() {
        Yii::app()->user->setFlash('DepositFail', 'Платеж не был завершен или возникла ошибка в процессе оплаты.');
        $this->redirect($this->createUrl('/private/'));
    }

    public function actionDepositSuccess() {
        $transaction = new UserTransactionsIncomplete();
        if ( isset($_POST) ) {
            $transaction->amount = $_POST['PAYMENT_AMOUNT'];
            $transaction->payer = $_POST['PAYER_ACCOUNT'];
            $transaction->hash = $_POST['V2_HASH'];
            $transaction->user_id = Yii::app()->user->id;
            $transaction->payment_id = $_POST['PAYMENT_ID'];

            if ( $transaction->save() ) {
                Yii::app()->user->setFlash('DepositSuccess', 'Платеж успешно завершен');

            } else {
                Yii::app()->user->setFlash('DepositSuccess', 'Произошла ошибка');
            }

        }
        $this->redirect($this->createUrl('/private/'));
    }

    public function actionDepositStatus() {
        $transactionInComlete = UserTransactionsIncomplete::model()->findByAttributes(array('payment_id' => $_POST['PAYMENT_ID']));
        define('ALTERNATE_PHRASE_HASH',  '748GH678GFH896HJ465GH9ZQP');
        // Path to directory to save logs. Make sure it has write permissions.
        define('PATH_TO_LOG',  Yii::app()->request->hostInfo.'/protected/runtime/deposit/');

        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
            $_POST['TIMESTAMPGMT'];

        $hash=strtoupper(md5($string));

        if($hash==$_POST['V2_HASH']){ // proccessing payment if only hash is valid
                /* In section below you must implement comparing of data you recieved
                with data you sent. This means to check if $_POST['PAYMENT_AMOUNT'] is
                particular amount you billed to client and so on. */
            if($_POST['PAYMENT_AMOUNT']==$transactionInComlete->amount && $_POST['PAYEE_ACCOUNT']==self::PAYEE_ACCOUNT && $_POST['PAYMENT_UNITS']==self::PAYMENT_UNITS){

                $transaction = new UserTransaction();
                $transaction->amount = $_POST['PAYMENT_AMOUNT'];
                $transaction->user_id = $transactionInComlete->user_id;
                $transaction->payment_id = $transactionInComlete->payment_id;
                $transaction->save();

                $f=fopen(PATH_TO_LOG."good.log", "ab+");
                fwrite($f, date("d.m.Y H:i")."; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

                mail('yborschev@gmail.com', 'Поступил новый платеж', $_POST['PAYMENT_AMOUNT']);

            }else{ // you can also save invalid payments for debug purposes

                $f=fopen(PATH_TO_LOG."bad.log", "ab+");
                fwrite($f, date("d.m.Y H:i")."; REASON: fake data; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

            }


        }else{ // you can also save invalid payments for debug purposes

            $f=fopen(PATH_TO_LOG."bad.log", "ab+");
            fwrite($f, date("d.m.Y H:i")."; REASON: bad hash; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
            fclose($f);

        }


    }

    //Партнерская программа
    public function actionReferral() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('referral', array(
            'user' => $user,
        ));
    }
}