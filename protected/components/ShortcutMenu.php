<?php
/**
 * UserMenu represents the users menu.
 */


Yii::import('zii.widgets.CPortlet');
 
class ShortcutMenu extends CPortlet
{
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('shortcutMenu');
    }
}
