<?php

/**
 * This is the model class for table "{{deposit}}".
 *
 * The followings are the available columns in table '{{deposit}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $deposit_type_id
 * @property integer $deposit_amount
 * @property integer $status
 * @property string $date
 * @property integer $expire
 */
class Deposit extends CActiveRecord
{
    const GLOBAL_PERCENT = 0.01;
    const MIN_AMOUNT = 200;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{deposit}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, deposit_type_id, deposit_amount, status', 'numerical', 'integerOnly'=>true),
			array('date, expire', 'safe'),
            array('deposit_amount', 'numerical', 'min' => self::MIN_AMOUNT, 'tooSmall' => 'Минимальная сумма ' . self::MIN_AMOUNT),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, deposit_type_id, deposit_amount, status, date, expire', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'deposit_type' => array(self::BELONGS_TO, 'DepositType', 'deposit_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'deposit_type_id' => 'Время депозита',
			'deposit_amount' => 'Сумма депозита',
            'expire' => 'Дата окончания депозита',
			'status' => 'Status',
			'date' => 'Date',
		);
	}
    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'date',
                'updateAttribute' => 'date',
                'setUpdateOnCreate' => true,
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        );
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('deposit_type_id',$this->deposit_type_id);
		$criteria->compare('deposit_amount',$this->deposit_amount);
        $criteria->compare('expire',$this->expire);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Deposit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
