<?php

/**
 * This is the model class for table "worklog".
 *
 * The followings are the available columns in table 'worklog':
 * @property integer $id
 * @property integer $task
 * @property integer $resource
 * @property double $hours
 * @property string $workdate
 * @property string $log
 */
class Worklog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Worklog the static model class
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
		return 'worklog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task, resource', 'numerical', 'integerOnly'=>true),
			array('hours', 'numerical'),
			array('workdate, log', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, task, resource, hours, workdate, log', 'safe', 'on'=>'search'),
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
			'task' => 'Task',
			'resource' => 'Resource',
			'hours' => 'Hours',
			'workdate' => 'Workdate',
			'log' => 'Log',
		);
	}
	
	protected function afterSave(){
	    if(parent::afterSave()){
	        $hours = $this->findBySql('select sum(`hours`) as `sum` from worklog where task = '. $this->task , array());	
			Yii::app()->db
			    ->createCommand("UPDATE Task SET time = :hoursSum WHERE Id = :TaskId")
			    ->bindValues(array(':hoursSum' => $hours->sum , ':TaskId' => $this->task))
			    ->execute();		
	        return TRUE;
	    }
	    else return false;
	
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
		$criteria->compare('task',$this->task);
		$criteria->compare('resource',$this->resource);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('workdate',$this->workdate,true);
		$criteria->compare('log',$this->log,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}