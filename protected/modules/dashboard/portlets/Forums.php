<?php
class Forums extends DPortlet
{

  protected function renderContent()
  {
    echo 'Forums Content';
  }
  
  protected function getTitle()
  {
    return 'Forums';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}