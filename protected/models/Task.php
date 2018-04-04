<?php

/**
 * This is the model class for table "task".
 *
 * The followings are the available columns in table 'task':
 * @property integer $id
 * @property string $name
 * @property integer $project
 * @property string $startdate
 * @property string $enddate
 * @property integer $assignedto
 * @property double $quantity
 * @property integer $time
 * @property string $module
 * @property integer $ref_id
 * @property integer $status
 * @property double $percent_complete
 *
 * The followings are the available model relations:
 * @property Project $project0
 * @property Valuelist $time0
 */
class Task extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project, assignedto, time, ref_id, status', 'numerical', 'integerOnly'=>true),
			array('quantity, percent_complete', 'numerical'),
			array('name', 'length', 'max'=>128),
			array('module', 'length', 'max'=>20),
			array('startdate, enddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, project, startdate, enddate, assignedto, quantity, time, module, ref_id, status, percent_complete', 'safe', 'on'=>'search'),
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
			'project0' => array(self::BELONGS_TO, 'Project', 'project'),
			'time0' => array(self::BELONGS_TO, 'Valuelist', 'time'),
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
			'project' => 'Project',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'assignedto' => 'Assignedto',
			'quantity' => 'Quantity',
			'time' => 'Time',
			'module' => 'Module',
			'ref_id' => 'Ref',
			'status' => 'Status',
			'percent_complete' => 'Percent Complete',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('project',$this->project);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('assignedto',$this->assignedto);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('time',$this->time);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('percent_complete',$this->percent_complete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
