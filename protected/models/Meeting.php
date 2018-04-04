<?php

/**
 * This is the model class for table "meeting".
 *
 * The followings are the available columns in table 'meeting':
 * @property string $id
 * @property string $name
 * @property string $location
 * @property string $activity_id
 * @property string $category_id
 * @property string $description
 * @property string $startdatetime
 * @property string $enddatetime
 * @property string $url
 * @property integer $attendee
 * @property integer $company
 * @property integer $project
 */
class Meeting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Meeting the static model class
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
		return 'meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attendee, company, project', 'numerical', 'integerOnly'=>true),
			array('name, location', 'length', 'max'=>64),
			array('activity_id, category_id', 'length', 'max'=>11),
			array('url', 'length', 'max'=>128),
			array('description, startdatetime, enddatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, location, activity_id, category_id, description, startdatetime, enddatetime, url, attendee, company, project', 'safe', 'on'=>'search'),
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
			'rAttendee'=>array(self::HAS_ONE, 'Users', 'id'),	
			'rActivity'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'activity_id'),
                        'condition'=>'rActivity.module="meeting" and rActivity.field="activity" '),
			'rCategory'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'category_id'),
                        'condition'=>'rCategory.module="meeting" and rCategory.field="category" '),
		
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
			'location' => 'Location',
			'activity_id' => 'Activity',
			'category_id' => 'Category',
			'description' => 'Description',
			'startdatetime' => 'Startdatetime',
			'enddatetime' => 'Enddatetime',
			'url' => 'Url',
			'attendee' => 'Attendee',
			'company' => 'Company',
			'project' => 'Project',
			'rActivity.name' => 'Activity',
			'rActivity.name' => 'Category',
		);
	}
	
	public function findMyMeetings($maxPortletRecords, $userid )
    {
        return $this->findAll(array(
            'condition'=>'attendee='.$userid,
        	'order'=>'startdatetime ASC',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('activity_id',$this->activity_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('startdatetime',$this->startdatetime,true);
		$criteria->compare('enddatetime',$this->enddatetime,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('attendee',$this->attendee);
		$criteria->compare('company',$this->company);
		$criteria->compare('project',$this->project);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}