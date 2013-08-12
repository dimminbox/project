<?php

class PaymentsController extends AdminController
{
    public function actionIndex()
    {

        $deps = Yii::app()->db->createCommand()
            ->select('expire, SUM(deposit_amount) as amount')
            ->from(Deposit::model()->tableName())
            ->group('DATE(expire)')
            ->order('expire ASC')
            ->where('status=1')
            ->limit('30')
            ->queryAll();


        $users = User::model()->findAll();

        $deposits = new CActiveDataProvider('Deposit',
            array(
                'criteria' => array(
                    'condition' => 't.status=1',
                ),
                'pagination' => array(
                    'pageSize' => 30,
                    'pageVar' => 'page',
                ),

            ));

        $this->render('index', array(
            'deps' => $deps,
            'deposits' => $deposits,
            'users' => $users,
        ));
    }

    public function actionUsersBalance()
    {

        $users = new CActiveDataProvider('User',
            array(
                'criteria'=>array(
                    //'condition'=>'amount>0',
                ),
                'pagination'=>array(
                    'pageSize'=>30,
                    'pageVar'=>'page',
                ),

            ));

        $this->render('usersBalance', array(
            'users' => $users,
        ));
    }

}