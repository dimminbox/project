<?php

class GeneralPercentController extends AdminController
{
    public $active = 'setup';

    public $date;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GeneralPercent;
        $months = GeneralPercent::model()->findAll();

        foreach ( $months as $month ) {
            $this->date = $month->date;
        }

        if ( $this->date == null ) {
            $this->date = date('Y-m-d');

        } else {

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if ( date('m', strtotime($this->date)) == 12 ) {
                $this->date = (date("Y-", strtotime($this->date)) + 1) .
                    date('m', strtotime($this->date)) .
                    date("-d", strtotime($this->date));
            }
            $this->date =  date("Y-", strtotime($this->date)) .
                (date('m', strtotime($this->date))+1) .
                date("-d", strtotime($this->date));
        }
        $date = $this->date;

		if( isset($_POST) && !empty($_POST) )
		{

            unset($_POST['yt0']);

            $json = CJSON::encode($_POST);

            $model->date = $date;
			$model->json_days = $json;
            //var_dump($model->json_days);die;
			if($model->save()) {
                Yii::app()->user->setFlash('adminSuccessMessage', 'Создано!');
                $this->redirect(array('index','id'=>$model->id));
            }


		}


        $dayofmonth = date('t', strtotime($date));

        $day_count = 1;
        //первая неделя
        $num = 0;
        for($i = 0; $i < 7; $i++)
        {
            // Вычисляем номер дня недели для числа
            $dayofweek = date('w', mktime(0, 0, 0, date('m', strtotime($date)), $day_count, date('Y', strtotime($date))));
            // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
            $dayofweek = $dayofweek - 1;
            if($dayofweek == -1) $dayofweek = 6;

            if($dayofweek == $i)
            {
                // Если дни недели совпадают,
                // заполняем массив $week
                // числами месяца
                $week[$num][$i] = $day_count;
                $day_count++;
            }
            else
            {
                $week[$num][$i] = "";
            }
        }

        // 2. Последующие недели месяца
        while(true)
        {
            $num++;
            for($i = 0; $i < 7; $i++)
            {
                $week[$num][$i] = $day_count;
                $day_count++;
                // Если достигли конца месяца - выходим
                // из цикла
                if($day_count > $dayofmonth) break;
            }
            // Если достигли конца месяца - выходим
            // из цикла
            if($day_count > $dayofmonth) break;
        }


		$this->render('create',array(
            'week' => $week,
            'date' => $date,
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

        $json = CJSON::decode($model['json_days']);


        $date = date('Y-m-d', strtotime($model->date));

        if( isset($_POST) && !empty($_POST) )
        {
            unset($_POST['yt0']);

            $json = CJSON::encode($_POST);

            $model->date = $date;
            $model->json_days = $json;

            if($model->save())
                Yii::app()->user->setFlash('adminSuccessMessage', 'Создано!');
            $this->redirect(array('index','id'=>$model->id));

        }


        $dayofmonth = date('t', strtotime($date));

        $day_count = 1;
        //первая неделя
        $num = 0;
        for($i = 0; $i < 7; $i++)
        {
            // Вычисляем номер дня недели для числа
            $dayofweek = date('w', mktime(0, 0, 0, date('m', strtotime($date)), $day_count, date('Y', strtotime($date))));
            // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
            $dayofweek = $dayofweek - 1;
            if($dayofweek == -1) $dayofweek = 6;

            if($dayofweek == $i)
            {
                // Если дни недели совпадают,
                // заполняем массив $week
                // числами месяца
                $week[$num][$i] = $day_count;
                $day_count++;
            }
            else
            {
                $week[$num][$i] = "";
            }
        }

        // 2. Последующие недели месяца
        while(true)
        {
            $num++;
            for($i = 0; $i < 7; $i++)
            {
                $week[$num][$i] = $day_count;
                $day_count++;
                // Если достигли конца месяца - выходим
                // из цикла
                if($day_count > $dayofmonth) break;
            }
            // Если достигли конца месяца - выходим
            // из цикла
            if($day_count > $dayofmonth) break;
        }



        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if( isset($_POST) && !empty($_POST) )
        {
            unset($_POST['yt0']);

            $json = CJSON::encode($_POST);

            $model->json_days = $json;

            if($model->save())
                Yii::app()->user->setFlash('adminSuccessMessage', 'Успешно обновлено!');
            $this->redirect(array('index','id'=>$model->id));

        }



		$this->render('update',array(
            'week' => $week,
            'json' => $json,
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GeneralPercent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GeneralPercent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeneralPercent']))
			$model->attributes=$_GET['GeneralPercent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GeneralPercent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='general-percent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
