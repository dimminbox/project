<?php

class PaymentsController extends AdminController
{
    public function actionIndex()
    {
        $amount = '';

        $this->render('index', array(
            'amount' => $amount,
        ));
    }
}