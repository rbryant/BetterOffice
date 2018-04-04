<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $address
 * @property integer $social
 * @property integer $website
 * @property string $manager
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Address $address0
 * @property Social $social0
 * @property Users $manager0
 * @property Websites $website0
 * @property Contact[] $contacts
 * @property Invoice[] $invoices
 * @property Issue[] $issues
 * @property Meeting[] $meetings
 * @property Opportunity[] $opportunities
 * @property Project[] $projects
 * @property Proposal[] $proposals
 * @property Resource[] $resources
 */
class Company extends CActiveRecord
{
    	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name', 'required'),
			array('id, address, social, website', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('manager', 'length', 'max'=>20),
			array('description, create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, address, social, website, manager, create_date', 'safe', 'on'=>'search'),
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
			'address0' => array(self::BELONGS_TO, 'Address', 'address'),
			'social0' => array(self::BELONGS_TO, 'Social', 'social'),
			'rUsers' => array(self::BELONGS_TO, 'Users', 'manager'),
			'website0' => array(self::BELONGS_TO, 'Websites', 'website'),
			'contacts' => array(self::HAS_MANY, 'Contact', 'company'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'customer'),
			'issues' => array(self::HAS_MANY, 'Issue', 'company_id'),
			'meetings' => array(self::HAS_MANY, 'Meeting', 'company'),
			'opportunities' => array(self::HAS_MANY, 'Opportunity', 'company'),
			'projects' => array(self::HAS_MANY, 'Project', 'company'),
			'proposals' => array(self::HAS_MANY, 'Proposal', 'company'),
			'resources' => array(self::HAS_MANY, 'Resource', 'company'),
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
			'address' => 'Address',
			'social' => 'Social',
			'website' => 'Website',
			'manager' => 'Manager',
			'create_date' => 'Create Date',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address);
		$criteria->compare('social',$this->social);
		$criteria->compare('website',$this->website);
		$criteria->compare('manager',$this->manager,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
       public function getAddresses(){
            $criteria=new CDbCriteria;
            $criteria->compare('id',$this->id);

            return new CActiveDataProvider(Address::model(), array(
			'criteria'=>$criteria,
            ));
	}
         
        public function filterOwner()
	{               
		$criteria=new CDbCriteria;

                $this->manager = Yii::app()->user->id;
                $criteria->compare('manager', $this->manager);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        protected function beforeSave(){
		//if ($this->isNewRecord)
	    //    $this->created = new CDbExpression('NOW()');
	    //else
	    $this->change_date = new CDbExpression('NOW()');
	 	
	    //$this->change_by = Yii::app()->user->id;
	    
	    return parent::beforeSave();
	        
	}	
}
