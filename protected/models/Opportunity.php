<?php

/**
 * This is the model class for table "opportunity".
 *
 * The followings are the available columns in table 'opportunity':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $amount
 * @property integer $type
 * @property integer $category
 * @property integer $owner
 * @property integer $status
 * @property string $change_date
 * @property integer $change_by
 * @property integer $company
 * @property integer $probability
 */
class Opportunity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Opportunity the static model class
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
		return 'opportunity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, category, owner, status, change_by, company, probability', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>128),
			array('description, change_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, amount, type, category, owner, status, change_date, change_by, company, probability', 'safe', 'on'=>'search'),
                        array('owner', 'safe', 'on'=>'filterOwner'),
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
			'rCompanies'=>array(self::HAS_ONE, 'Company',  array('id'=>'company')),
			'rOwner'=>array(self::HAS_ONE, 'Users',  array('id'=>'owner')),
			'rUsers'=>array(self::HAS_ONE, 'Users',  array('id'=>'change_by')),
			'rStatus'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'status'),
                        'condition'=>'rStatus.module="opportunity" and rStatus.field="status" '),
			'rType'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'type'),
                        'condition'=>'rType.module="opportunity" and rType.field="type" '),
			'rCategory'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'category'),
                        'condition'=>'rCategory.module="opportunity" and rCategory.field="category" '),
			'rProbability'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'probability'),
                        'condition'=>'rProbability.module="opportunity" and rProbability.field="probability" '),
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
			'amount' => 'Amount',
			'rType.name' => 'Type',
			'category' => 'Category',
			'rOwner.user_name' => 'Owner',
			'rStatus.name' => 'Status',
			'change_date' => 'Change Date',
			'rUsers.user_name' => 'Change By',
			'rCompanies.name' => 'Company',
			'rProbability.name' => 'Probability',
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
		$criteria->compare('amount',$this->amount);
		$criteria->compare('type',$this->type);
		$criteria->compare('category',$this->category);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('status',$this->status);
		$criteria->compare('change_date',$this->change_date,true);
		$criteria->compare('change_by',$this->change_by);
		$criteria->compare('company',$this->company);
		$criteria->compare('probability',$this->probability);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function filterOwner()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
                
		$criteria=new CDbCriteria;

                $this->owner = Yii::app()->user->id;
                $criteria->compare('owner', $this->owner);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterFind(){
	    parent::afterFind();
	    $this->change_date = date('m/d/Y',strtotime($this->change_date));
	}
	
	protected function beforeSave(){
		//if ($this->isNewRecord)
	    //    $this->created = new CDbExpression('NOW()');
	    //else
	        $this->change_date = new CDbExpression('NOW()');
	 	
	    $this->change_by = Yii::app()->user->id;
	    
	    return parent::beforeSave();
	        
	}	

}