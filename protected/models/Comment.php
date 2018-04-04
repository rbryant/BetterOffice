<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $create_time
 * @property integer $userId
 * @property integer $ref_id
 * @property string $module
 *
 * The followings are the available model relations:
 * @property Valuelist $status0
 * @property Users $user
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, status, create_time, userId, ref_id', 'required'),
			array('status, userId, ref_id', 'numerical', 'integerOnly'=>true),
			array('module', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, status, create_time, userId, ref_id, module', 'safe', 'on'=>'search'),
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
			'rStatus'=>array(self::BELONGS_TO, 'Valuelist', '', 'on'=>'value=status and field="status" and module="comment"', 'joinType'=>'INNER JOIN', 'alias'=>'rStatus'),
			'rUser' => array(self::BELONGS_TO, 'Users', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'userId' => 'User',
			'ref_id' => 'Ref',
			'module' => 'Module',
		);
	}

	public function findRecentComments($maxPortletRecords, $module, $ref_id )
        {
            return $this->with('rUser')->findAll(array(
                'condition'=>'t.status="2" and t.module="'.$module.'" and t.ref_id like "'.$ref_id.'"',
                'order'=>'t.create_time DESC',
                'limit'=>'5',
            ));
        }
    
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('module',$this->module,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}