<?php
class News extends DPortlet
{

  protected function renderContent()
  {
  		$model = Comment::model();
		//$this->renderPartial('//comment/portletView', array('model'=>$model));
		Yii::app()->controller->renderFile(Yii::app()->basePath.'\views\comment\portletView.php',array('model'=>$model));
  }
  
  protected function getTitle()
  {
    return 'What\'s going on?';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}