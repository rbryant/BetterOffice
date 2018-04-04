<?php


Yii::import('zii.widgets.CPortlet');
 
class MyOpportunities extends CPortlet
{
    public $title='';
    public $maxPortletRecords=10;
    public $userid;
 
    protected function renderContent()
    {
        $this->render('myOpportunities');
    }
}
?>