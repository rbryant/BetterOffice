<?php
class Friends extends DPortlet
{

  protected function renderContent()
  {
    echo 'Friends Content';
  }
  
  protected function getTitle()
  {
    return 'Friends';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}