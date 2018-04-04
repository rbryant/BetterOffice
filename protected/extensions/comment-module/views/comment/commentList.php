<?php
$model = Comment::model();

$comments = $model->getComments();

$commentDataProvider = new CArrayDataProvider($comments, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));

/** @var CArrayDataProvider $comments */
$comments = $commentDataProvider;
$comments->setPagination(false);

$this->renderPartial('comment.views.comment._form', array(
	'comment'=>$model->commentInstance
));

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$commentDataProvider,
	'itemView'=>'comment.views.comment._view'
));



