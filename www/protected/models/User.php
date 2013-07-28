<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $register_time
 * @property string $update_time
 * @property integer $tel
 * @property integer $role_id
 * @property integer $purse
 */
class User extends CActiveRecord
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 7;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password', 'length', 'max'=>255),
            array('email', 'email'),
            array('password', 'length', 'min'=>6),
            array('name, email', 'unique'),
            array('name', 'match', 'pattern'=>'/^[A-Za-zs,]+$/u',
                'message'=>'Имя должно содержать только символы латинского алфавита.'),
			array('register_time, update_time, role_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, password, register_time, update_time, role_id, tel, purse', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'refs' => array(self::HAS_MANY, 'Referral', 'user_id'),
            'role' => array(self::BELONGS_TO, 'UserRole', 'role_id'),
            'transaction' => array(self::HAS_MANY, 'UserTransaction', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'register_time' => 'Register Time',
			'update_time' => 'Update Time',
            'tel' => 'Phone',
            'role_id' => 'Role',
            'purse' => 'Purse',
  		);
	}
    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'register_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
                'timestampExpression' => new CDbExpression('NOW()'),
            ),
        );
    }
    public function referralUser($user_name) {
        $user = User::model()->findByAttributes(array('name' => $user_name));
        if ( $user != null ) {
            return $user;
        } else {
            Yii::app()->user->setState('ref',null);
            return false;
        }
    }
    public static function cryptPassword($password, $salt=null) {
        return crypt($password, $salt);
    }

    protected function beforeSave() {

        if ( $this->getIsNewRecord() ) {
            $this->password = self::cryptPassword($this->password);
        } else {
            $old_password = self::model()->findByPk($this->id)->password;
            if ( $old_password != $this->password ) {
                $this->password = self::cryptPassword($this->password);
            }
        }

        return parent::beforeSave();

    }

    protected function afterSave() {

    }
    public function getAmount() {
        if ( !$this->isNewRecord ) {
            $result = Yii::app()->db->createCommand("
                SELECT amount_after
                FROM " . UserTransaction::model()->tableName() . "
                WHERE user_id=" . $this->id . "
                ORDER BY id DESC
                LIMIT 1
                ")->queryScalar();
            return $result ?: 0;
        } else {
            return 0;
        }
    }

    /**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('register_time',$this->register_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->compare('role_id',$this->role_id,true);
        $criteria->compare('tel',$this->tel,true);
        $criteria->compare('purse',$this->purse,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
