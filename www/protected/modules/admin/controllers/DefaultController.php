<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
        $messages = Message::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));

		$this->render('index', array(
            'messages' => $messages,
        ));
	}

}