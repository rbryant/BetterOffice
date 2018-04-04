<?php


class CmCreateForm extends CWidget
{
	public $dataModel;
	
	public function init()
	{
		ob_start();
	}
	
	public function run()
	{
		$model = Comment::model();
		$this->controller->render('comment.views.comment._form', array(
		    'comment'=>$model->commentInstance
	    ));
	
	}
}