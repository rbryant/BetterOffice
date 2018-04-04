<?php
/**
 * DashMenu represents the users dashboard menu.
 */


Yii::import('zii.widgets.CPortlet');
 
class DashMenu extends CPortlet
{
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('dashMenu');
    }
}
