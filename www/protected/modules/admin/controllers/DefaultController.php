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

<<<<<<< HEAD

=======
>>>>>>> e2ef7e8fe7f4ac050bad8d85f326c88640561cc7
}