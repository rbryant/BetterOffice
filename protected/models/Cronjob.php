<?php

/**
 * This is the model class for table "cronjob".
 *
 * The followings are the available columns in table 'cronjob':
 * @property integer $id
 * @property string $execute_after
 * @property string $executed_at
 * @property integer $succeeded
 * @property string $action
 * @property string $parameters
 * @property string $execution_result
 * @property integer $frequency
 */
class Cronjob extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cronjob';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('succeeded, frequency', 'numerical', 'integerOnly'=>true),
			array('execute_after, executed_at, action, parameters, execution_result', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, execute_after, executed_at, succeeded, action, parameters, execution_result, frequency', 'safe', 'on'=>'search'),
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
			'execute_after' => 'Execute After',
			'executed_at' => 'Executed At',
			'succeeded' => 'Succeeded',
			'action' => 'Action',
			'parameters' => 'Parameters',
			'execution_result' => 'Execution Result',
			'frequency' => 'Frequency',
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
		$criteria->compare('execute_after',$this->execute_after,true);
		$criteria->compare('executed_at',$this->executed_at,true);
		$criteria->compare('succeeded',$this->succeeded);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('parameters',$this->parameters,true);
		$criteria->compare('execution_result',$this->execution_result,true);
		$criteria->compare('frequency',$this->frequency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cronjob the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        private function getMicrotime(){
                $time = microtime();
                $time = explode(' ', $time);
                $time = $time[1] + $time[0];
                return $time;
        }
        private function totalTime($start){
                $finish = $this->getMicrotime();
                return round(($finish - $start), 4);        
        }
        
        public function runCron(){
                $start = $this->getMicrotime();


                $now = new DateTime('now', new DateTimeZone('GMT'));
                $now = $now->format("Y-m-d H:i:s");
                
                //$jobs = Cronjob::model()->findAll('execute_after <:now or executed_at IS NULL ORDER BY id ASC', array(':now'=>$now));
                $jobs = Cronjob::model()->findAll(array('order'=>'id', 'condition'=>'execute_after <:now or executed_at IS NULL', 'params'=>array(':now'=>$now)));
                for($i=0;$i<count($jobs); $i++){
                        $job = $jobs[$i];
                        echo "Processing Job " . $job->id . "\r\n";
                        
                        if(method_exists($this, $job->action)){
                                $result = $this->{$job->action}($job->parameters);
                                                                
                                if($result === false){
                                        // do nothing, let the next cycle pick it up
                                        continue;
                                }else{
                                        $executed_at = new DateTime('now', new DateTimeZone('GMT'));
                                        
                                        $freq = $job->frequency.' Minutes';
                                        //$interval = new DateInterval($freq);

                                        $job->succeeded = $result['succeeded'] ? 1 : 0;
                                        $job->execution_result = array_key_exists('execution_result', $result) ? $result['execution_result'] : "";
                                        $job->executed_at = $executed_at->format('Y-m-d H:i:s');
                                        $newdate = $executed_at->modify('+10 minutes');
                                        $job->execute_after = date('Y-m-d H:i:s', strtotime($newdate));
                                        
                                        if($job->validate()){
                                          echo "Validated";
                                            $job->update();
                                          echo 'post update';
                                        }
                                }
                        }else{
                                $executed_at = new DateTime('now', new DateTimeZone('GMT'));
                                $job->executed_at = $executed_at->format('Y-m-d H:i:s');
                                $job->succeeded = 0;
                                $job->execution_result = 'Action does not exist.';
                                $job->save();
                                echo 'post update';
                        }
                        
                        // if, God forbid, this script ever run longer than 9 minutes, abort the loop.
                        // If you don't heroku will kill the script after 10 (cron runs every 10 minutes).
                        // I'd rather end it myself cleanly and let the next iteration pick up whatever is
                        // left to be processed.
                        if($this->totalTime($start) >= (9*60)) break;
                }
        }        
        
        public function testJob($params){
                // this job doesn't do anything, just returns success.
                //echo 'test Job';
                return array(
                        'succeeded' => true,
                        'execution_result' => 'Job succeeded'
                );        
        }
}
