<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
    public $email;
    const ERROR_EMAIL_INVALID = 'Неправильный email';

    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('email'=>$this->email));
        if($record===null)
            $this->errorCode=self::ERROR_EMAIL_INVALID;
        else if($record->password!==crypt($this->password,$record->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id = $record->id;
            $this->setState('id', $record->id);
            $this->setState('email', $record->email);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }
}