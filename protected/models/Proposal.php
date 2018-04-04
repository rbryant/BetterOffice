<?php

/**
 * This is the model class for table "proposal".
 *
 * The followings are the available columns in table 'proposal':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $company
 * @property double $total
 * @property integer $cover
 * @property string $pdf
 * @property integer $sendto
 * @property string $message
 * @property integer $status
 * @property integer $project
 * @property integer $proposal
 *
 * The followings are the available model relations:
 * @property Project[] $projects
 * @property Company $company0
 * @property Text $cover0
 * @property Contact $sendto0
 * @property Valuelist $status0
 */
class Proposal extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Proposal the static model class
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
        return 'proposal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('company, cover, sendto, status, project, opportunity', 'numerical', 'integerOnly'=>true),
            array('total', 'numerical'),
            array('name, description', 'length', 'max'=>128),
            array('pdf', 'length', 'max'=>1),
            array('message', 'length', 'max'=>256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, description, company, total, cover, pdf, sendto, message, status, project, opportunity', 'safe', 'on'=>'search'),
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
            'rProject' => array(self::HAS_ONE, 'Project',  array('id'=>'project')),
            'rOpportunity' => array(self::HAS_ONE, 'Opportunity', array('id'=>'opportunity')),
        	'rCompanies' => array(self::BELONGS_TO, 'Company', 'company'),
            'rCover' => array(self::BELONGS_TO, 'Text', 'cover'),
            'rContact' => array(self::BELONGS_TO, 'Contact', 'sendto'),
			'rStatus'=>array(self::HAS_ONE, 'Valuelist', array('value'=>'status'),
                        'condition'=>'rStatus.module="proposal" and rStatus.field="status" '),
            'rProposalLine' => array(self::HAS_MANY, 'ProposalLine',  array('proposal'=>'id')),
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
            'company' => 'Company',
            'total' => 'Total',
            'cover' => 'Cover',
            'pdf' => 'Pdf',
            'sendto' => 'Sendto',
            'message' => 'Message',
            'status' => 'Status',
            'project' => 'Project',
            'opportunity' => 'Opportunity',
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
        $criteria->compare('company',$this->company);
        $criteria->compare('total',$this->total);
        $criteria->compare('cover',$this->cover);
        $criteria->compare('pdf',$this->pdf,true);
        $criteria->compare('sendto',$this->sendto);
        $criteria->compare('message',$this->message,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('project',$this->project);
        $criteria->compare('opportunity',$this->opportunity);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
