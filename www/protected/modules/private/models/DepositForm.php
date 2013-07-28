<?php

class DepositForm extends CFormModel {

    public $PAYEE_ACCOUNT = 'U4330448'; //* номернашего кошелька
    public $PAYEE_NAME = 'yborsc'; //* Имя, которое видит пользователь, совершающий платеж
    public $PAYMENT_ID = 'upmoney'; //Идентификатор данного платежа. Вы можете ввести сюда любое слово или текст
    public $PAYMENT_AMOUNT = 100; //сумма платежа
    public $PAYMENT_UNITS = 'USD'; //* Валюта платежа. USD, EUR, OAU. Должна соответствовать выбранному аккаунту
    public $STATUS_URL = 'http://yborsc.bget.ru/index.php/private/default/depositStatus'; //Это ULR, по мерчант будет обращаться после успешного проведения платежа.
                        //Вы можете ввести следующий - mailto:user@server.com для направления Ваших
                        //платежей на указанный e-mail.
    public $PAYMENT_URL = 'http://yborsc.bget.ru/index.php/private/default/depositSuccess'; //* Это URL куда пользователь будет перенаправлен после успешного проведения платежа.
    public $PAYMENT_URL_METHOD = 'POST'; //GET / POST / LINK
    public $NOPAYMENT_URL = 'http://project.local/index.php/private/default/depositFail'; //* Это URL куда пользователь будет перенаправлен после неудачной попытки провести платеж.
    public $NOPAYMENT_URL_METHOD = 'POST'; //GET / POST / LINK
    public $SUGGESTED_MEMO; //Дополнительные поля.



    public function attributeLabels()
    {
        return array(
            'PAYMENT_AMOUNT'=>'Введите сумму в долларах (USD):',
        );
    }




}