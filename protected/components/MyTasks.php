<?php


Yii::import('zii.widgets.CPortlet');
 
class MyTasks extends CPortlet
{
    public $title='';
    public $maxPortletRecords=10;
    public $userid;
 
    public function getMyTasks()
    {
    	$userid = Yii::app()->user->id;
        return Task::model()->findMyTasks($this->maxPortletRecords, $userid );
    }
 
    protected function renderContent()
    {
        $this->render('myTasks');
    }
}
?>