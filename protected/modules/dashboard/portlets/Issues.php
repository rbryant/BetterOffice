<?php
class Issues extends DPortlet
{

  protected function renderContent()
  {
  		$this->widget('MyIssues', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
  	  }
  
  protected function getTitle()
  {
    return 'My Issues';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}

