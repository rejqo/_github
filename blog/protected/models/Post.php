<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property integer $p_id
 * @property string $p_title
 * @property integer $p_body
 * @property integer $p_status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $u_id
 *
 * The followings are the available model relations:
 * @property TblComment[] $tblComments
 * @property TblUser $u
 */
class Post extends CActiveRecord
{
	//status constats
	const STATUS_DRAFT=1;
		const STATUS_PUBLISHED=2;
		const STATUS_ARCHIVED=3;

	//url
	public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array(
            'p_id'=>$this->p_id,
            'p_title'=>$this->p_title,
        ));
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_post';
	}
	//for rules
	public function normalizeTags($attribute,$params)
	{
		$this->$t_name=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_title, p_body, p_status', 'required'),
			array('p_title', 'length', 'max'=>128),
			array('p_status', 'in', 'range'=>array(1,2,3)),
			array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/',
			'message'=>'Tags can only contain word characters.'),
			array('tags', 'normalizeTags'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('p_title, p_status', 'safe', 'on'=>'search'),
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
			'co_name' => array(self::BELONGS_TO, 'u', 'u_id'),
			'tblComments' => array(self::HAS_MANY, 'TblComment', 'p_id',
				'condition'=>'tblComments.p_status='.Comment::STATUS_APPROVED,
				'order'=>'TblComment.created_at DESC'),
			'commentCount' => array(self::STAT, 'tblComments', 'P',
				'condition'=>'status='.Comment::STATUS_APPROVED),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'p_id' => 'Post',
			'p_title' => 'Title',
			'p_body' => 'Body',
			'p_status' => 'Status',
			'created_at' => 'Created at',
			'u_id' => 'User',
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

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('p_title',$this->p_title,true);
		$criteria->compare('p_body',$this->p_body);
		$criteria->compare('p_status',$this->p_status);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('u_id',$this->u_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave()
{
	//before a post is saved
    if(parent::beforeSave())
    {
        if($this->isNewRecord)
        {
            $this->created_at=$this->updated_at=time();
            $this->author_id=Yii::app()->u->u_id;
        }
        else
            $this->updated_at=time();
        return true;
    }
    else
        return false;
}
	//after a post is saved
	protected function afterSave()
{
    parent::afterSave();
    Tag::model()->updateFrequency($this->_oldTags, $this->tags);
}
 
private $_oldTags;
 
protected function afterFind()
{
    parent::afterFind();
    $this->_oldTags=$this->tags;
}
//after deleting a post


}
