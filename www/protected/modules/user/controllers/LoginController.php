<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
                $user = User::model()->findByAttributes(array('username'=>$_POST['UserLogin']['username']));
                if ( $user != null && $user->status == User::STATUS_NOACTIVE) {
                    Yii::app()->user->setState('id_for_activation', $user->id);
                    $this->redirect('/activation');
                }

				$model->attributes=$_POST['UserLogin'];

				// validate user input and redirect to previous page if valid
				if($model->validate()) {

					$this->lastViset();
                    if (UserModule::isAdmin()) {
                        $this->redirect('/admin');
                    } else {
                        $this->redirect(Yii::app()->controller->module->returnUrl);
                    }
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}