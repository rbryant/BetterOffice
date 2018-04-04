<?php
class Meetings extends DPortlet
{

  protected function renderContent()
  {
 		$this->widget('MyMeetings', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
  }
  
  protected function getTitle()
  {
    return 'My Meetings';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}