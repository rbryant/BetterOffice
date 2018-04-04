<?php


Yii::import('zii.widgets.CPortlet');
 
class RecentComments extends CPortlet
{
    public $title='';
    public $maxPortletRecords;
    public $module;
    public $ref_id;
 
    public function getRecentComments()
    {
    	$maxPortletRecords=5;
        return Comment::model()->findRecentComments($this->maxPortletRecords, $this->module, $this->ref_id );
    }
 
    protected function renderContent()
    {
        $this->render('recentComments');
    }
}