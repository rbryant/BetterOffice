<?php

/**
 * This is the model class for table "contact".
 *
 * The followings are the available columns in table 'contact':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $title
 * @property integer $company_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property Proposal[] $proposals
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
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
		return 'contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('firstname, lastname, company_id', 'required'),
                    array('company', 'numerical', 'integerOnly'=>true),
                    array('firstname, lastname, title', 'length', 'max'=>128),
                    array('description', 'safe'),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, firstname, lastname, title, company_id, description', 'safe', 'on'=>'search'),
                    array('manager', 'safe', 'on'=>'filterOwner'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company'),
			'proposals' => array(self::HAS_MANY, 'Proposal', 'sendto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'title' => 'Title',
			'company' => 'Company',
			'description' => 'Description',
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
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('company',$this->company);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function filterOwner()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
                
		$criteria=new CDbCriteria;

                $manager = Yii::app()->user->id;
                
                $contactData=Yii::app()->db->createCommand("
		SELECT c.id, c.firstname, c.lastname, c.title, p.name as company, c.description
		from contact c left join company p
		on c.id = p.manager where p.manager='".$manager."'")->queryAll();
		
                return $contactDataProvider = new CArrayDataProvider($contactData, array(
                        'keyField'=>'id',
                        'pagination'=>array(
                                'pageSize'=>10,
                                ),
                ));
		/*
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                 * 
                 */
	}        
}