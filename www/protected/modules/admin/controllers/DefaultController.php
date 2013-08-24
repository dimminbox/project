<?php

class DefaultController extends AdminController
{
    private $_model;

    public $active = 'index';

	public function actionIndex()
	{

		$this->render('index', array(

        ));
	}


    public function actionOperations(){
        $model = $this->loadModel();

        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('user_id' => $model->id));
        $criteria->limit = 10;
        $criteria->order = 'id DESC';
        $userTransaction = UserTransaction::model()->findAll($criteria);

        $this->render('operations',array(
            'model'=>$model,
            'userTransaction'=>$userTransaction,
        ));
    }

    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
}