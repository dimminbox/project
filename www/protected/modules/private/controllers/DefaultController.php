<?php

class DefaultController extends PrivateController
{
	public function actionIndex()
	{
		$this->render('index');
	}
    //Пополнение счета
    public function actionDeposit($amount=null) {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $deposit = new DepositForm();

        $this->render('deposit', array(
            'user' => $user,
            'deposit' => $deposit,
        ));
    }
    public function actionDepositFail() {
        Yii::app()->user->setFlash('DepositFail', 'Платеж не был завершен или возникла ошибка в процессе оплаты.');
        $this->redirect($this->createUrl('/private/default/deposit/'));
    }

    public function actionDepositSuccess() {
        Yii::app()->user->setFlash('DepositSuccess', 'Платеж успешно завершен.');
        $this->redirect($this->createUrl('/private/default/deposit/'));
    }
    //Партнерская программа
    public function actionReferral() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('referral', array(
            'user' => $user,
        ));
    }
}