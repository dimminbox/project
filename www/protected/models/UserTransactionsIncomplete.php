<?php

/**
 * This is the model class for table "{{user_transactions_incomplete}}".
 *
 * The followings are the available columns in table '{{user_transactions_incomplete}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $amount
 * @property string $payer
 * @property string $hash
 * @property string $reason
 * @property string $time
 */
class UserTransactionsIncomplete extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_transactions_incomplete}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('reason', 'length', 'max'=>255),
			array('time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, payment_id, amount, payer, hash, reason, time', 'safe', 'on'=>'search'),
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
            'payment_id' => 'Payment_id',
			'amount' => 'Amount',
            'payer' => 'Payer',
            'hash' => 'Hash',
			'reason' => 'Reason',
			'time' => 'Time',
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
        $criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('amount',$this->amount,true);
        $criteria->compare('payer',$this->payer,true);
        $criteria->compare('hash',$this->hash,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'time',
                'updateAttribute' => 'time',
                'setUpdateOnCreate' => true,
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        );
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserTransactionsIncomplete the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
