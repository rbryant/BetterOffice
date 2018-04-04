<?php 
Yii::import('ext.browsehistory.models.Browsehistory');
$maxNbOfRoutes = 10;
$history = Browsehistory::getInstance();
//$history->push(null, $this->pageTitle);
/*
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => TbHtml::NAV_TYPE_PILLS,
    'items' => array('label' => 'Recent', 'items' =>$history->items(),
    ),
)); 
 
 */
$this->widget('zii.widgets.CMenu', array(
    'items'=>$history->items(),
));
?>