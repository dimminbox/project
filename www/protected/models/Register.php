<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Register extends CFormModel
{
    public $name;
    public $password;
    public $password_repeat;
    public $email;
    public $tel;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
// username and password are required
            array('name, password, password_repeat, email', 'required'),
            array('password_repeat', 'compare', 'compareAttribute'=>'password'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'name' => 'Имя',
            'email' => 'Адрес электронной почты',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'tel' => 'Телефон',
        );
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function registerSave()
    {

        $user = new User();
        $user->name = $this->name;
        $user->password = $this->password;
        $user->email = $this->email;
        $user->tel = $this->tel;
        $result = $user->save();

        if ( false === $result ) {
            foreach ( $user->getErrors() as $field => $errors ) {
                $this->addError($field, implode('<br />', $errors));
            }
            return false;
        }

        $this->_identity=new UserIdentity($this->email, $this->password);
        $this->_identity->authenticate();
        $duration= 3600*24*30; // 30 days
        Yii::app()->user->login($this->_identity, $duration);
        return true;
    }
}