<?php

/**
 * This is the model class for table "{{deposit_type}}".
 *
 * The followings are the available columns in table '{{deposit_type}}':
 * @property integer $id
 * @property string $type
 * @property integer $percent
 * @property integer $days
 * @property integer $min_amount
 * @property integer $max_amount
 * @property integer $description
 */
class DepositType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{deposit_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('percent, min_amount, max_amount', 'numerical'),
			array('type', 'length', 'max'=>255),
            array('days, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, percent', 'safe', 'on'=>'search'),
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
            'deposit' => array(self::HAS_MANY, 'Deposit', 'deposit_type_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Название депозита',
            'description' => 'Описание',
            'days' => 'Количество дней',
			'percent' => 'Percent',
            'min_amount' => 'Минимальная сумма',
            'max_amount' => 'Максимальная сумма',

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
		$criteria->compare('type',$this->type,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('min_amount',$this->min_amount);
        $criteria->compare('max_amount',$this->max_amount);
        $criteria->compare('days',$this->days);
		$criteria->compare('percent',$this->percent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DepositType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
