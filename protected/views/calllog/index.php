<?php
$this->breadcrumbs=array(
	'Comments',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('comment-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Comments</h1>
<hr />


<?php $this->renderPartial('callLogview', array('model'=>$model)); ?> 

