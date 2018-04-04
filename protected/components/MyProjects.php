<?php


Yii::import('zii.widgets.CPortlet');
 
class MyProjects extends CPortlet
{
    public $title='';
    public $maxPortletRecords=10;
    public $userid;
 
    protected function renderContent()
    {
        $this->render('myProjects');
    }
}
?>