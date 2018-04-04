<?php
$this =  DashboardPortlet::model();
$this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
));
$this->widget('bootstrap.widgets.TbMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
));
$this->endWidget();
?>