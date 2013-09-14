<?php

class SiteController extends Controller
{
    public $layout='//layouts/column2';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($ref = null)
	{
		if ( Yii::app()->user->getState('ref') == null && $ref != null ) {
            Yii::app()->user->setState('ref', $ref);
            $this->redirect('/');
        }
        $this->layout = '//layouts/home_column2';
		$this->render('index');
	}

    public function actionAjaxWindowPayments() {

        $file = Yii::app()->basePath . '/pay_json.txt';
        $fileJson = fopen($file, 'r');
        $json = fread($fileJson, 1000);
        fclose($fileJson);

        $data = CJSON::decode($json);

        $render = '<table id="payments_table">';
        $render .= '<tr><th>Time</th><th>Name</th><th>Amount</th></tr>';
        $i = 0;

        foreach( $data['payments'] as $transaction ) {
            $i++;
            $class = '';
            if ( is_int($i/2) ){
                $class = 'class = "alt"';
            }
            $render .= '<tr ' . $class . '>';
                $render .= '<td>' . date('d.m H:i', $transaction['time']) . '</td>';
                $render .= '<td>' . $transaction['name'] . '</td>';
                $render .= '<td>' . $transaction['amount'] . ' $</td>';
            $render .= '</tr>';
        }

        $render .= '</table>';

        echo $render;
    }

    public function actionDemonWindowPayments() {

        $min_time = 60;
        $max_time = 60*60*3;
        //$time = time() - rand($min_time, $max_time);

        $file = Yii::app()->basePath . '/pay_json.txt';
        $fileJson = fopen($file, 'r');
        $json = fread($fileJson, 1000);
        fclose($fileJson);
        $data = CJSON::decode($json);

        $criteria = new CDbCriteria();
        $criteria->condition = 'amount_type = ' . UserTransaction::AMOUNT_TYPE_OUTPUT . ' AND id > ' . $data['last_real_id'];
        $criteria->limit = 10;
        $criteria->order = 'id ASC';
        $transactions = UserTransaction::model()->findAll($criteria);
        $real = false;
        $data['time'] = time() + rand($min_time, $max_time);

        if ( !empty($transactions)) {

            $i = 0;

            $last_real_id = $data['last_real_id'];
            $total = count($transactions)-1;

            foreach( $transactions as $transaction ) {

                if ( $transaction->id > $last_real_id  ) {

                    if ( $i == $total ) {
                        $data['last_real_id'] = $transaction->id;
                    }

                    $user = array(
                        'id' => $transaction->id,
                        'time' => strtotime($transaction->time),
                        'name' => $transaction->user->username,
                        'amount' => (float)abs($transaction->amount),
                    );
                    array_unshift($data['payments'], $user);
                    $i++;
                }
            }

            if ( $i > 0) {


                for($c=10, $users = count($data['payments']);$c<$users;$c++) {
                    unset($data['payments'][$c]);
                }

                $fileJson = fopen($file, 'w');
                fwrite($fileJson, CJSON::encode($data));
                fclose($fileJson);

            }

            $real = true;

        }


        if ( $real == false && time() > $data['time'] ) {

                $file = Yii::app()->basePath . '/pay_users.txt';
                $fileUsers = file($file);

                $user = array_rand($fileUsers);

                $user = array(
                    'id' => 0,
                    'time' => time(),
                    'name' => $fileUsers[$user],
                    'amount' => rand(3,150),
                );
                array_unshift($data['payments'], $user);


                unset($data['payments'][10]);

                $file = Yii::app()->basePath . '/pay_json.txt';
                $fileJson = fopen($file, 'w');
                fwrite($fileJson, CJSON::encode($data));
                fclose($fileJson);
        }




    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionAbout() {
        $this->render('pages/about');
    }

	/**
	 * Displays the contact page
	 */


    public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    public function actionFaq()
    {
        $this->render('pages/faq');
    }

    public function actionReferral()
    {
        $this->render('pages/referral');
    }
	/**
	 * Displays the login page
     * @param string $email
	 */
   /* public function actionRegister() {

        $register = new Register();

        if(isset($_POST['Register']))
        {
            $register->attributes=$_POST['Register'];

            if( $register->validate() && $register->registerSave() ) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }


        $this->render('register',array('model'=>$register));
    }*/

	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}