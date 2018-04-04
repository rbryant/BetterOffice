<?php 

$this->widget('bootstrap.widgets.TbMenu', array(
    //'type' => TbHtml::NAV_TYPE_PILLS,
    'htmlOptions' => array('class' => 'nav nav-multilevel oroplatform-menu'),
    'items' => array(
        array('label' => 'ACCOUNTS', 'htmlOptions'=>array('class'=>'dropdown-menu menu_level_1'), 
            'items' => array(		
                array('label'=>'Accounts Portal', 'icon'=>'home', 'url'=>array('/site/ViewAccountPortal'), 'visible'=>Yii::app()->user->checkAccess('AccountPortal_Access')),
                array('label'=>'Leads', 'icon'=>'star-empty', 'url'=>array('/contact/leads'), 'visible'=>Yii::app()->user->checkAccess('Contact_Access')),
                array('label'=>'Companies', 'icon'=>'globe', 'url'=>array('/company'), 'visible'=>Yii::app()->user->checkAccess('Company_Access')),
                array('label'=>'Contacts', 'icon'=>'user', 'url'=>array('/contact'), 'visible'=>Yii::app()->user->checkAccess('Contact_Access')),
                array('label'=>'Meetings', 'icon'=>'calendar', 'url'=>array('/meeting'), 'visible'=>Yii::app()->user->checkAccess('Meeting_Access')),
                array('label'=>'Call Log', 'icon'=>'pencil', 'url'=>array('/calllog'), 'visible'=>Yii::app()->user->checkAccess('Comment_Access')),
            ), 'htmlOptions'=>array('class'=>'dropdown')
        ),
        array('label' => 'SALES', 'items' => array(
                array('label'=>'Sales Portal', 'icon'=>'icon-th-large', 'url'=>array('/site/ViewSalePortal'), 'visible'=>Yii::app()->user->checkAccess('SalePortal_Access')),
                array('label'=>'Opportunities', 'icon'=>'signal', 'url'=>array('/opportunity'), 'visible'=>Yii::app()->user->checkAccess('Opportunity_Access')),
                array('label'=>'Proposals', 'icon'=>'flag', 'url'=>array('/proposal'), 'visible'=>Yii::app()->user->checkAccess('Proposal_Access')),
        )),
        array('label' => 'PROJECTS', 'items' => array(
                array('label'=>'Project Portal', 'icon'=>'icon-th-large', 'url'=>array('/site/ViewProjectPortal'), 'visible'=>Yii::app()->user->checkAccess('ProjectPortal_Access')),
                array('label'=>'Projects', 'icon'=>'briefcase', 'url'=>array('/project'), 'visible'=>Yii::app()->user->checkAccess('Project_Access')),
                array('label'=>'Tasks', 'icon'=>'tasks', 'url'=>array('/task'), 'visible'=>Yii::app()->user->checkAccess('Task_Access')),
                array('label'=>'Resources', 'icon'=>'exclamation-sign', 'url'=>array('/resource'), 'visible'=>Yii::app()->user->checkAccess('Resource_Access')),
        )),
        array('label' => 'SUPPORT', 'items' => array(
                array('label'=>'Support Portal', 'icon'=>'icon-th-large', 'url'=>array('/site/ViewSupportPortal'), 'visible'=>Yii::app()->user->checkAccess('SupportPortal_Access')),
                array('label'=>'Issues', 'icon'=>'ok-sign', 'url'=>array('/issue'), 'visible'=>Yii::app()->user->checkAccess('Issues_Access')),
        )),
    ),
)); 

?>