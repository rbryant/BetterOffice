<?php
class Opportunities extends DPortlet
{

  protected function renderContent()
  {
 		$this->widget('MyOpportunities', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
  }
  
  protected function getTitle()
  {
    return 'My Opportunities';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}