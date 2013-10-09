<?php

class RegistrationController extends Controller
{
    public $defaultAction = 'registration';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }
    /**
     * Registration user
     */
    public function actionRegistration() {
        $model = new RegistrationForm;
        $profile=new Profile;
        $profile->regMode = true;


        // ajax validator
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
        {
            echo UActiveForm::validate(array($model,$profile));
            Yii::app()->end();
        }

        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->profileUrl);
        } else {
            if(isset($_POST['RegistrationForm'])) {

                $model->attributes=$_POST['RegistrationForm'];
                $profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
                if($model->validate()&&$profile->validate())
                {
                    $soucePassword = $model->password;
                    $model->activkey=UserModule::smsCode();
                    //$model->activkey=UserModule::encrypting(microtime().$model->password);
                    $model->password=UserModule::encrypting($model->password);
                    $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
                    $model->superuser=0;
                    $model->internal_purse = mt_rand(10000, 99999) . mt_rand(10000, 99999);
                    $model->status=((Yii::app()->controller->module->activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);
                    $model->secret = $_POST['RegistrationForm']['secret'];
                    $model->phone = UserModule::validatePhone($_POST['RegistrationForm']['phone']);

                    if ($model->save()) {

                        $profile->user_id=$model->id;
                        $profile->save();

                        if ( isset($_POST['RegistrationForm']['referrer_id']) ) {

                            $referral = new Referral();
                            $referral->user_id = $_POST['RegistrationForm']['referrer_id'];
                            $referral->ref_id = $model->id;
                            $referral->save();
                        }

                        if (Yii::app()->controller->module->sendSmsActivation) {
                            $message = 'Activation code: ' . $model->activkey;
                            Sms::send($model->phone, $message);
                        }

                        if (Yii::app()->controller->module->sendActivationMail) {
                            $activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));

                            $headers =
                                "From: " . Yii::app()->name . " < " . Yii::app()->params['adminEmail'] . ">\r\n" .
                                "Reply-To: " . Yii::app()->name . "\r\n" .
                                "MIME-Version: 1.0\r\n" .
                                "Content-Type: text/html; charset=\"utf-8\"\r\n" .
                                "Content-Transfer-Encoding: 8bit\r\n" .
                                "X-Mailer: PHP/" . phpversion();

                            UserModule::sendMail($model->email,
                                                UserModule::t("Welcome to {site_name}",
                                                            array('{site_name}'=>Yii::app()->name)),
                                                UserModule::t("{first_name} {last_name}, welcome to {site_name}<br />Please activate you account go to {activation_url}",
                                                            array('{activation_url}'=>$activation_url,
                                                                  '{site_name}'=>Yii::app()->name,
                                                                  '{first_name}' => $profile->first_name,
                                                                  '{last_name}' => $profile->last_name)),
                                                $headers,
                                                "-f{params['adminEmail']}"
                                                );
                        }
                        /*
                        if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) {
                            $identity=new UserIdentity($model->username,$soucePassword);
                            $identity->authenticate();
                            Yii::app()->user->login($identity,0);
                            $this->redirect(Yii::app()->controller->module->returnUrl);
                        } else {
                            if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
                            } elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl))));
                            } elseif(Yii::app()->controller->module->loginNotActiv) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login."));
                            } else {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email."));
                            }
                            $this->refresh();
                        }*/

                        if ( $model->status == User::STATUS_NOACTIVE ) {
                            Yii::app()->user->setState('id_for_activation', $model->id);
                            $this->redirect('activation');
                        }
                    }
                } else $profile->validate();
            }
            $this->render('/user/registration',array('model'=>$model,'profile'=>$profile));
        }
    }

    public function actionSmsActivation() {


        if (isset($_POST['User']['activkey']) ) {

            $find = User::model()->notsafe()->findByPk(Yii::app()->user->id_for_activation);

            if ( $_POST['User']['activkey'] == $find->activkey  ) {

                    $find->activkey = UserModule::smsCode();
                    $find->status = 1;
                    $find->save();
                Yii::app()->user->setFlash('activation',UserModule::t("You account is activated."));
                $this->redirect('/user/login');


            } else {
                Yii::app()->user->setFlash('errorActivationCode',UserModule::t("Invalid activation code."));
            }

        } else {
            $user = User::model()->findByPk(Yii::app()->user->id_for_activation);
            $this->render('/user/smsActivation',array('model'=>$user));
        }


    }
}