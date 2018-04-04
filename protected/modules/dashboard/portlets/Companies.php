<?php
class Companies extends DPortlet
{

  protected function renderContent()
  {
  		
 		$this->widget('MyCompanies', array(
	        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
	    )); 
   }
  
  protected function getTitle()
  {
    return 'My Companies';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}