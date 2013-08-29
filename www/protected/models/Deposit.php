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
 * @property integer $reinvest
 */
class Deposit extends CActiveRecord
{
    const MIN_AMOUNT = 10;

    const REINVEST_YES = 1;
    const REINVEST_NO = 2;

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
			array('user_id, deposit_type_id, deposit_amount, status, reinvest', 'numerical', 'integerOnly'=>true),
			array('date, expire, reinvest', 'safe'),
            array('deposit_amount', 'numerical', 'min' => self::MIN_AMOUNT, 'tooSmall' => 'Минимальная сумма ' . self::MIN_AMOUNT . '$'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, deposit_type_id, deposit_amount, status, date, expire, reinvest', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    /*
     *
     * @TODO доделать функцию вычисления минимальной суммы депозита
     */
    public function minDepositAmount() {


    }

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
			'user_id' => 'Пользователь',
			'deposit_type_id' => 'Время депозита',
			'deposit_amount' => 'Сумма депозита',
            'expire' => 'Дата окончания депозита',
            'reinvest' => 'Реинвестирование',
			'status' => 'Статус',
			'date' => 'Дата окончания',
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
        $criteria->compare('reinvest',$this->reinvest);
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

    public function depositsAmount($date) {
        if ( !$this->isNewRecord ) {
            $result = Yii::app()->db->createCommand("
                SELECT SUM(deposit_amount)
                AS deposit_amount
                FROM " . $this->tableName() . "
                WHERE expire>=DATE('2013-08-12 00:00:00') AND expire<=DATE('2013-08-12 23:59:59')
                AND status=1
                ")->queryScalar();

            return $result ?: 0;
        } else {
            return 0;
        }
    }
    //вычисляем общий процент на сегодняшний день
    static public function findTodayGeneralPercent() {

        $criteria = new CDbCriteria();
        $criteria->condition = "date_format(date, '%Y%m') = date_format(now(), '%Y%m');";

        $dataMonths = GeneralPercent::model()->findAll($criteria);

        foreach( $dataMonths as $dataDays ) {

            $data = CJSON::decode($dataDays->json_days);

            foreach( $data  as $key=>$val ) {

                if ( $key == date('d', time()) ) {

                    return $val;

                }

            }
        }

        return Yii::app()->params['defaultGeneralPercent'];
    }

}
