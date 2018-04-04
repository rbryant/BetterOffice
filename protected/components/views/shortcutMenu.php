<?php $this->widget('bootstrap.widgets.TbMenu', array(
    //'type' => TbHtml::NAV_TYPE_PILLS,
    'htmlOptions'=>array('class' => 'fa-share-square'), 
    'items' => array(
        array('label'=>'', 'url'=>'#', 'htmlOptions'=>array('class' => 'fa-share-square'),
                'items'=>array(
                        array('label'=>'Company', 'url'=>array('/company/create')),
                        array('label'=>'Contact', 'url'=>array('/contact/create')),
                        array('label'=>'Opportunity', 'url'=>array('/opportunity/create')),
                        array('label'=>'Proposal', 'url'=>array('/proposal/create')),
                        array('label'=>'Project', 'url'=>array('/project/create')),
                        array('label'=>'Task', 'url'=>array('/task/create')),
        )),
    ),
)); ?>