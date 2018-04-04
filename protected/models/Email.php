<?php

/**
 * This is the model class for table "email".
 *
 * The followings are the available columns in table 'email':
 * @property integer $id
 * @property string $email
 * @property integer $type
 * @property string $module
 * @property integer $ref_id
 */
class Email extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Email the static model class
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
		return 'email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, type, module, ref_id', 'required'),
			array('type, ref_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>128),
			array('module', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, type, module, ref_id', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'type' => 'Type',
			'module' => 'Module',
			'ref_id' => 'Ref',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('ref_id',$this->ref_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}