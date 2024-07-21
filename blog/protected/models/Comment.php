<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $co_id
 * @property string $co_name
 * @property string $co_email
 * @property string $co_body
 * @property integer $co_status
 * @property string $crated_at
 * @property integer $p_id
 * ///////co_name is the commenters name//////////
 * The followings are the available model relations:
 * @property TblPost $p
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_comment';
	}
	const STATUS_PENDING=0;
    const STATUS_APPROVED=1;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('co_name, co_body, co_email ', 'required'),
			array('co_name, co_email', 'length', 'max'=>128),
			array('email','email'),
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
			'p' => array(self::BELONGS_TO, 'TblPost', 'p_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'co_id' => 'ID',
			'co_name' => 'Name',
			'co_email' => 'Email',
			'co_body' => 'Comment',
			'co_status' => 'status',
			'crated_at' => 'Created at',
			'p_id' => 'Post',
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

		$criteria->compare('co_id',$this->co_id);
		$criteria->compare('co_name',$this->co_name,true);
		$criteria->compare('co_email',$this->co_email,true);
		$criteria->compare('co_body',$this->co_body,true);
		$criteria->compare('co_status',$this->co_status);
		$criteria->compare('crated_at',$this->crated_at,true);
		$criteria->compare('p_id',$this->p_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	//befor saving comment
	protected function beforeSave()
{
    if(parent::beforeSave())
    {
        if($this->isNewRecord)
            $this->crated_at=time();
        return true;
    }
    else
        return false;
}
}
