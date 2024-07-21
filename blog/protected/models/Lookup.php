<?php

/**
 * This is the model class for table "tbl_lookup".
 *
 * The followings are the available columns in table 'tbl_lookup':
 * @property integer $l_id
 * @property string $l_name
 * @property integer $l_code
 * @property integer $l_type
 * @property integer $l_position
 */
class Lookup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_lookup';
	}
	//represent status in text
	private static $_items=array();
 
    public static function items($l_type)
    {
        if(!isset(self::$_items[$l_type]))
            self::loadItems($l_type);
        return self::$_items[$l_type];
    }
 
    public static function item($l_type,$l_code)
    {
        if(!isset(self::$_items[$l_type]))
            self::loadItems($l_type);
        return isset(self::$_items[$l_type][$l_code]) ? self::$_items[$l_type][$l_code] : false;
    }
 
    private static function loadItems($l_type)
    {
        self::$_items[$l_type]=array();
        $models=self::model()->findAll(array(
            'condition'=>'type=:l_type',
            'params'=>array(':type'=>$l_type),
            'order'=>'l_position',
        ));
        foreach($models as $model)
            self::$_items[$l_type][$model->code]=$model->name;
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_id, l_name, l_code, l_type, l_position', 'required'),
			array('l_id, l_code, l_type, l_position', 'numerical', 'integerOnly'=>true),
			array('l_name', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('l_id, l_name, l_code, l_type, l_position', 'safe', 'on'=>'search'),
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
			'l_id' => 'L',
			'l_name' => 'L Name',
			'l_code' => 'L Code',
			'l_type' => 'L Type',
			'l_position' => 'L Position',
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

		$criteria->compare('l_id',$this->l_id);
		$criteria->compare('l_name',$this->l_name,true);
		$criteria->compare('l_code',$this->l_code);
		$criteria->compare('l_type',$this->l_type);
		$criteria->compare('l_position',$this->l_position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lookup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
