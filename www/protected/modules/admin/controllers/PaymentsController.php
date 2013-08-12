<?php

class PaymentsController extends AdminController
{
    public function actionIndex()
    {

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
            //'deps' => $deps,
            'deposits' => $deposits,
            'users' => $users,
        ));
    }

    public function actionUsersBalance()
    {

        //$users = User::model()->findAll();

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