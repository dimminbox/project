<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout='//layouts/column2';
    const PAYEE_ACCOUNT = 'U4330448'; //* номернашего кошелька
    const PAYMENT_UNITS = 'USD';
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		$model = $this->loadUser();


        $deposit = new DepositForm();
        $deposit->PAYEE_ACCOUNT = self::PAYEE_ACCOUNT;
        $deposit->PAYEE_NAME = 'project';
        $deposit->PAYMENT_ID = uniqid(Yii::app()->user->id + time());
        $deposit->PAYMENT_UNITS = self::PAYMENT_UNITS;
        $deposit->PAYMENT_AMOUNT = 100;
        $deposit->STATUS_URL = $this->createAbsoluteUrl('/user/profile/depositStatus');
        $deposit->PAYMENT_URL = $this->createAbsoluteUrl('/user/profile/depositSuccess');
        $deposit->PAYMENT_URL_METHOD = 'POST';
        $deposit->NOPAYMENT_URL = $this->createAbsoluteUrl('/user/profile/depositFail');
        $deposit->PAYMENT_URL_METHOD = 'POST';

        $investment = new Deposit();

        $this->render('profile',array(
	    	'model'=>$model,
            'deposit' => $deposit,
            'investment' => $investment,
			'profile'=>$model->profile,
	    ));
	}

    //Партнерская программа
    public function actionReferral() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('referral', array(
            'user' => $user,
        ));
    }

    public function actionDeposit() {

    }

    public function actionDepositFail() {
        Yii::app()->user->setFlash('profileMessageFail', 'Платеж не был завершен или возникла ошибка в процессе оплаты.');
        $this->redirect($this->createUrl('/user/profile'));
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
                Yii::app()->user->setFlash('profileMessage', 'Платеж успешно завершен');

            } else {
                Yii::app()->user->setFlash('profileMessageFail', 'Произошла ошибка');
            }

        }
        $this->redirect($this->createUrl('/user/profile'));
    }

    public function actionDepositStatus() {
        $transactionInComlete = UserTransactionsIncomplete::model()->findByAttributes(array('payment_id' => $_POST['PAYMENT_ID']));

        define('ALTERNATE_PHRASE_HASH',  '748GH678GFH896HJ465GH9ZQP');
        // Path to directory to save logs. Make sure it has write permissions.
        define('PATH_TO_LOG',  'protected/runtime/deposit/');
        $alternate = strtoupper(md5(ALTERNATE_PHRASE_HASH));
        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'. $alternate .':'.
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
                $transaction->reason = 'Пополнение счета';
                $transaction->save();

                $f=fopen(PATH_TO_LOG."good.log", "ab+");
                fwrite($f, date("d.m.Y H:i")."; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

                mail('yborschev@gmail.com', 'Поступил новый платеж', $_POST['PAYMENT_AMOUNT']);

            }else{ // you can also save invalid payments for debug purposes

                $f=fopen(PATH_TO_LOG."bad.log", "a");
                fwrite($f, date("d.m.Y H:i")."; REASON: fake data; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

            }

        }
    }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		$model = $this->loadUser();
		$profile=$model->profile;
		
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
                Yii::app()->user->updateSession();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} else $profile->validate();
		}

		$this->render('edit',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}