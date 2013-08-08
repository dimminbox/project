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
        $deposit->PAYEE_ACCOUNT = Yii::app()->params['payee_account'];
        $deposit->PAYEE_NAME = 'project';
        $deposit->PAYMENT_ID = uniqid(Yii::app()->user->id + time());
        $deposit->PAYMENT_UNITS = Yii::app()->params['payment_units'];
        $deposit->PAYMENT_AMOUNT = 100;
        $deposit->STATUS_URL = $this->createAbsoluteUrl('/user/profile/depositStatus');
        $deposit->PAYMENT_URL = $this->createAbsoluteUrl('/user/profile/depositSuccess');
        $deposit->PAYMENT_URL_METHOD = 'POST';
        $deposit->NOPAYMENT_URL = $this->createAbsoluteUrl('/user/profile/depositFail');
        $deposit->PAYMENT_URL_METHOD = 'POST';

        $investment = new Deposit();
        $transfer = new UserTransaction();
        $this->render('profile',array(
            'model'=>$model,
            'deposit' => $deposit,
            'investment' => $investment,
            'transfer'=>$transfer,
        ));
    }

    //Партнерская программа
    public function actionReferral() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('referral', array(
            'user' => $user,
        ));
    }
    //Инвестирование
    public function actionInvestment() {
        $amount = (float)User::model()->getAmount();

            if ( isset($_POST['Deposit']) ) {

                $depositType = DepositType::model()->findByPk($_POST['Deposit']['deposit_type_id']);

                if ( $amount < $_POST['Deposit']['deposit_amount']) {
                    Yii::app()->user->setFlash('profileMessageFail', 'На вашем счете недостаточно средств');
                } else {

                    $transaction = new UserTransaction();
                    $transaction->user_id = Yii::app()->user->id;
                    $transaction->amount = -$_POST['Deposit']['deposit_amount'];
                    $transaction->amount_type = UserTransaction::AMOUNT_TYPE_INVESTMENT;
                    $transaction->reason = 'Инвестирование в депозит';

                    if ( $transaction->save() ) {
                        $deposit = new Deposit();
                        $deposit->attributes = $_POST['Deposit'];
                        $deposit->expire = date('Y-m-d H:i:s', $depositType->days * 86400 + time());
                        $deposit->user_id = Yii::app()->user->id;
                        $deposit->status = 1;
                        $deposit->save();

                        Yii::app()->user->setFlash('profileMessage', 'Покупка депозита успешно завершена');
                    } else {
                        Yii::app()->user->setFlash('profileMessageFail', 'Произошла ошибка');
                    }
                }
            }

        $this->redirect($this->createUrl('/user/profile'));
    }

    public function actionTransfer(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        $amount = (float)User::model()->getAmount();
        if ( $_POST['User']['secret'] == $user->secret ) {
            if ( isset($_POST['UserTransaction']) && isset($_POST['User'])) {

                $user = User::model()->findByAttributes(array('internal_purse'=>$_POST['User']['internal_purse']));
                if ( $user != null) {
                    if ( $amount < $_POST['UserTransaction']['amount']) {
                        Yii::app()->user->setFlash('profileMessageFail', 'На вашем счете недостаточно средств');
                    } else {

                        $transaction = new UserTransaction();
                        $transaction->user_id = Yii::app()->user->id;
                        $transaction->amount = -$_POST['UserTransaction']['amount'];
                        $transaction->amount_type = UserTransaction::AMOUNT_TYPE_TRANSFER;
                        $transaction->reason = 'Певедод средств на кошелек ' . $_POST['User']['internal_purse']
                            . ' пользователю ' . $user->username;

                        if ( $transaction->save() ) {
                            $transactionTo = new UserTransaction();
                            $transactionTo->user_id = $user->id;
                            $transactionTo->amount = $_POST['UserTransaction']['amount'];
                            $transactionTo->amount_type = UserTransaction::AMOUNT_TYPE_RECHARGE;

                            $transactionTo->reason = 'Певедод средств от пользователя ' . User::model()->findByPk(Yii::app()->user->id)->username;
                            $transactionTo->save();
                            Yii::app()->user->setFlash('profileMessage', 'Перевод произошел успешно');
                        } else {
                            Yii::app()->user->setFlash('profileMessageFail', 'Произошла ошибка');
                        }
                    }
                } else {
                    Yii::app()->user->setFlash('profileMessageFail', 'Такого кошелька не существует');
                }
            }
        } else {Yii::app()->user->setFlash('profileMessageFail', 'Не верный секретный код');}
        $this->redirect($this->createUrl('/user/profile'));
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
            if($_POST['PAYMENT_AMOUNT']==$transactionInComlete->amount && $_POST['PAYEE_ACCOUNT']==Yii::app()->params['payee_account'] && $_POST['PAYMENT_UNITS']==Yii::app()->params['payment_units']){

                $transaction = new UserTransaction();
                $transaction->amount = $_POST['PAYMENT_AMOUNT'];
                $transaction->user_id = $transactionInComlete->user_id;
                $transaction->payment_id = $transactionInComlete->payment_id;
                $transaction->reason = 'Пополнение счета';
                $transaction->amount_type = UserTransaction::AMOUNT_TYPE_RECHARGE;
                $transaction->save();

                $f=fopen(PATH_TO_LOG."good.log", "ab+");
                fwrite($f, date("d.m.Y H:i")."; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

                mail(Yii::app()->params->adminEmail, 'Поступил новый платеж', $_POST['PAYMENT_AMOUNT']);

            }else{ // you can also save invalid payments for debug purposes

                $f=fopen(PATH_TO_LOG."bad.log", "a");
                fwrite($f, date("d.m.Y H:i")."; REASON: fake data; POST: ".serialize($_POST)."; STRING: $string; HASH: $hash\n");
                fclose($f);

            }

        }
    }
    // Вывод на перфект мани
    public function actionOutputMoney() {

        if ( !empty($_POST['output_money'])) {

            $user = User::model()->findByPk(Yii::app()->user->id);
            $amount = User::model()->amount;

            if ( $_POST['User']['secret'] == $user->secret ) {

                if ( $user->perfect_purse != null ) {

                    if ( $_POST['output_money'] <= $amount ) {

                        $payment_id = uniqid(Yii::app()->user->id + time());
                        $amount = UserTransaction::model()->replaceComma($_POST['output_money']);


                        $f=fopen('https://perfectmoney.is/acct/confirm.asp?AccountID=' . Yii::app()->params['AccountID'] . '&PassPhrase=' . Yii::app()->params['PassPhrase'] . '&Payer_Account=' . Yii::app()->params['payee_account'] . '&Payee_Account=' . $user->perfect_purse . '&Amount=' . $amount . '&PAY_IN=' . $amount . ' &PAYMENT_ID=' . $payment_id, 'rb');

                        if($f===false){
                            echo 'ошибка открытия файла';
                        }

                        // getting data
                        $out=array(); $out="";
                        while(!feof($f)) $out.=fgets($f);

                        fclose($f);

                        // searching for hidden fields
                        if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
                            echo 'Неправильный вывод';
                            exit;
                        }

                        $reply="";
                        foreach($result as $item){
                            $key=$item[1];
                            $reply[$key]=$item[2];
                        }

                        if ( isset($reply['ERROR']) ) {

                        $outputTransaction = new UsersOutputTransaction();
                        $outputTransaction->user_id = Yii::app()->user->id;
                        $outputTransaction->error = $reply['ERROR'];
                        $outputTransaction->status = UsersOutputTransaction::STATUS_ERROR;
                        $outputTransaction->payment_amount = $amount;
                        $outputTransaction->payment_id = $payment_id;
                        $outputTransaction->payee_account = $user->perfect_purse;
                        $outputTransaction->save();

                        $subject = 'Ошибка! Вывод PerfectMoney';
                        $message = "Ошибка: ". $reply['ERROR'] ."\r\n
                                    ID Пользователя: ". Yii::app()->user->id ."\r\n
                                    Сумма вывода: ". $amount ."\r\n
                                    ID Транзакции: ". $payment_id ."\r\n
                                    Кошелек PerfectMoney: ". $user->perfect_purse ."\r\n
                                    ";

                        mail(Yii::app()->params->adminEmail, 'Ошибка вывода на PerfectMoney', $message);

                        User::model()->sendMessage(1, $subject, $message, Message::IMPORTANCE_1 );

                        Yii::app()->user->setFlash('profileMessageFail', 'Произошла неожиданная ошибка<br />
                                                    Информация об ошибке отправлена администратору сайта<br />
                                                    Администратор свяжется с Вами в ближайшее время');

                        $this->redirect($this->createUrl('/user/profile'));

                    } else {

                        $transaction = new UserTransaction();
                        $transaction->amount = -UserTransaction::model()->replaceComma($_POST['output_money']);
                        $transaction->user_id = $user->id;
                        $transaction->reason = 'Вывод средств на кошелек Perfect Money';
                        $transaction->amount_type = UserTransaction::AMOUNT_TYPE_OUTPUT;
                        $transaction->payment_id = $payment_id;
                        $transaction->save();

                        $outputTransaction = new UsersOutputTransaction();
                        $outputTransaction->user_id = Yii::app()->user->id;
                        $outputTransaction->payee_account_name = $reply['Payee_Account_Name'];
                        $outputTransaction->payment_batch_num = $reply['PAYMENT_BATCH_NUM'];
                        $outputTransaction->status = UsersOutputTransaction::STATUS_OK;
                        $outputTransaction->payment_amount = $amount;
                        $outputTransaction->payment_id = $payment_id;
                        $outputTransaction->payee_account = $user->perfect_purse;
                        $outputTransaction->save();


                            Yii::app()->user->setFlash('profileMessage', 'Вывод успешно завершен');
                        }


                    } else {
                        Yii::app()->user->setFlash('profileMessageFail', 'Неверно указана сумма');
                    }

                } else {
                    Yii::app()->user->setFlash('profileMessageFail', 'Укажите в настройках аккаунта кошелек Perfect Money');
                }
            } else {
                Yii::app()->user->setFlash('profileMessageFail', 'Не верный секретный код');
            }


        }

        $this->redirect($this->createUrl('/user/profile'));
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

    public function actionOperations() {
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('user_id' => Yii::app()->user->id));
        $count=UserTransaction::model()->count($criteria);
        $pages=new CPagination($count);
        // элементов на страницу
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $criteria->order = 'id DESC';
        $models = UserTransaction::model()->findAll($criteria);
        $this->render('operations', array(
            'models' => $models,
            'pages' => $pages
        ));
    }

    public function actionDeposits() {
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('user_id' => Yii::app()->user->id));
        $count=Deposit::model()->count($criteria);
        $pages=new CPagination($count);
        // элементов на страницу
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $criteria->order = 'id DESC';
        $models = Deposit::model()->findAll($criteria);
        $this->render('deposits', array(
            'models' => $models,
            'pages' => $pages
        ));
    }
}