<?php

class DefaultController extends PrivateController
{
	public function actionIndex()
	{
		$this->render('index');
	}
    public function actionDeposit($amount=null) {
        $user = User::model()->findByPk(Yii::app()->user->id);

        $this->render('deposit', array(
            'user' => $user,
        ));


    }
}