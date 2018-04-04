<?php

/**
 * This is the model class for table "proposal_line".
 *
 * The followings are the available columns in table 'proposal_line':
 * @property integer $id
 * @property integer $catnum
 * @property string $description
 * @property double $quantity
 * @property double $price
 * @property integer $time
 * @property double $linecost
 * @property string $taxable
 * @property integer $proposal
 *
 * The followings are the available model relations:
 * @property Catalog $catnum0
 */
class ProposalLine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProposalLine the static model class
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
		return 'proposal_line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catnum, time, proposal', 'numerical', 'integerOnly'=>true),
			array('quantity, price, linecost', 'numerical'),
			array('description', 'length', 'max'=>128),
			array('taxable', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catnum, description, quantity, price, time, linecost, taxable, proposal', 'safe', 'on'=>'search'),
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
			'catnum0' => array(self::BELONGS_TO, 'Catalog', 'catnum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catnum' => 'Catnum',
			'description' => 'Description',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'time' => 'Time',
			'linecost' => 'Linecost',
			'taxable' => 'Taxable',
			'proposal' => 'Proposal',
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
		$criteria->compare('catnum',$this->catnum);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('time',$this->time);
		$criteria->compare('linecost',$this->linecost);
		$criteria->compare('taxable',$this->taxable,true);
		$criteria->compare('proposal',$this->proposal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}