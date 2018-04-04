<?php
class Projects extends DPortlet
{

  protected function renderContent()
  {
 		$this->widget('MyProjects', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
  	  }
  
  protected function getTitle()
  {
    return 'My Projects';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}