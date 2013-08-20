<?php

class MessagesController extends AdminController
{

     public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('user_id' => Yii::app()->user->id));
        $count=Message::model()->count($criteria);
        $pages=new CPagination($count);
        // элементов на страницу
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $criteria->order = 'status DESC, importance, ';
        $messages = Message::model()->findAll($criteria);
        $this->render('messages', array(
            'messages' => $messages,
            'pages' => $pages
        ));
     }

    public function actionView($id) {

        $message = Message::model()->findByPk($id);

        if ( $message->status == 1 ) {
            $message->status = Message::MESSAGE_STATUS_READ;
            $message->save();
        }

        $this->render('view', array(
            'message' => $message,
        ));

    }

    public function actionDelete($id) {

    }
}