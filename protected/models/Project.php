<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $proposal
 * @property integer $user
 * @property double $total
 * @property string $startdate
 * @property string $enddate
 * @property integer $company
 * @property double $budget
 * @property double $percent_complete
 *
 * The followings are the available model relations:
 * @property Proposal $proposal0
 * @property Company $company0
 * @property Task[] $tasks
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal, user, company', 'numerical', 'integerOnly'=>true),
			array('total, budget, percent_complete', 'numerical'),
			array('name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>256),
			array('startdate, enddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, proposal, user, total, startdate, enddate, company, budget, percent_complete', 'safe', 'on'=>'search'),
                    array('user', 'safe', 'on'=>'filterOwner'),
			array(
			  'enddate',
			  'compare',
			  'compareAttribute'=>'startdate',
			  'operator'=>'>', 
			  'allowEmpty'=>false , 
			  'message'=>'{attribute} must be greater than "{compareValue}".'
			),
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
			'proposals' => array(self::BELONGS_TO, 'Proposal', 'proposal'),
			'companies' => array(self::BELONGS_TO, 'Company', 'company'),
			'owner' => array(self::HAS_ONE, 'Users', 'id'),
			'tasks' => array(self::HAS_MANY, 'Task', 'project'),
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
			'description' => 'Description',
			'proposal' => 'Proposal',
			'user' => 'Owner',
			'total' => 'Total',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'company' => 'Company',
			'budget' => 'Budget',
			'percent_complete' => 'Percent Complete',
		);
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('proposal',$this->proposal);
		$criteria->compare('user',$this->user);
		$criteria->compare('total',$this->total);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('company',$this->company);
		$criteria->compare('budget',$this->budget);
		$criteria->compare('percent_complete',$this->percent_complete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function filterOwner()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
                
		$criteria=new CDbCriteria;

                $this->user = Yii::app()->user->id;
                $criteria->addBetweenCondition('status', '1', '3', 'AND');
                $criteria->compare('user', $this->user);
                
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }
	
	protected function afterFind(){
	    parent::afterFind();
	    $this->startdate = date('m/d/Y',strtotime($this->startdate));
	    $this->enddate = date('m/d/Y',strtotime($this->enddate));
	}
	
	protected function beforeSave(){
	    //if(parent::beforeSave()){
	        $this->startdate=date('Y-m-d', strtotime($this->startdate));
	        $this->enddate=date('Y-m-d', strtotime($this->enddate));
	        return TRUE;
	    //}
	    //else return false;
	}
}