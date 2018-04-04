<?php
class Tasks extends DPortlet
{

  protected function renderContent()
  {
  		//$model = Comment::model();
		//Yii::app()->controller->renderFile(Yii::app()->basePath.'\views\comment\portletView.php',array('model'=>$model));
  		$this->widget('MyTasks', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
  
  }
  
  protected function getTitle()
  {
    return 'My Tasks';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}