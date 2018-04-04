
<?php 

$this->widget('bootstrap.widgets.TbMenu', array(
    //'type' => TbHtml::NAV_TYPE_PILLS,
    'htmlOptions' => array('class'=>'pull-right'),
    'items' => array(
        array('label' => Yii::app()->user->getFullName(), 
            'items' => array(
                array('label'=>'Logout', 'icon'=>'lock', 'url'=>array('/site/logout')),
                '---',
                array('label'=>'My Profile', 'icon'=>'user', 'url'=>array('/bum/users/viewProfile', 'id'=>Yii::app()->user->id)),
                array('label'=>'Users', 'icon'=>'user', 'url'=>array('/bum/users')),
                array('label'=>'Permissions', 'icon'=>'cog', 'url'=>array('/auth')),
                //array('label'=>'Help', 'icon'=>'hand-right', 'url'=>array('/help')),
                )
            ),
        array('label'=>' ', 'itemOptions' => array('class'=>'fa fa-question-circle'), 'url'=>array('/help'),     
            ),
        ),
)); ?>