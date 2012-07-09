<?php

class ForumPresenter extends BasePresenter 
{
  private $forums;
   
  public function actionDefault()
  {
        $this->forums = $this->context->models->forums->getAll();
 
  }
  public function renderDefault()
    {
        $this->template->forums = $this->forums;
        //$this->template->users = $this->forums->related('users');
    } 
}