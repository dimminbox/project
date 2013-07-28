<?php

class DefaultController extends PrivateController
{
	public function actionIndex()
	{
		$this->render('index');
	}
    //Пополнение счета
    public function actionDeposit($amount=null) {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $deposit = new DepositForm();

        $this->render('deposit', array(
            'user' => $user,
            'deposit' => $deposit,
        ));
    }
    public function actionDepositFail() {
        Yii::app()->user->setFlash('DepositFail', 'Платеж не был завершен или возникла ошибка в процессе оплаты.');
        $this->redirect($this->createUrl('/private/default/deposit/'));
    }
    public function actionDepositStatus() {

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
            if($_POST['PAYMENT_AMOUNT']=='15.95' && $_POST['PAYEE_ACCOUNT']=='U1234567' && $_POST['PAYMENT_UNITS']=='USD'){

                        /* ...insert some code to proccess valid payments here... */

                $f=fopen(PATH_TO_LOG."good.log", "ab+");
                fwrite($f, date("d.m.Y H:i")."; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

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
    public function actionDepositSuccess() {
        Yii::app()->user->setFlash('DepositSuccess', 'Платеж успешно завершен.');
        $this->redirect($this->createUrl('/private/default/deposit/'));
    }
    //Партнерская программа
    public function actionReferral() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('referral', array(
            'user' => $user,
        ));
    }
}