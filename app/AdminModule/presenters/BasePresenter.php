<?php

namespace AdminModule;


abstract class BasePresenter extends \BasePresenter 
{
    
    protected function startup()
    {
        parent::startup();
        
        if (!$this->user->isLoggedIn()) {
            $this->redirect(':Account:login', array('backlink' => $this->storeRequest()));
        }
        
        if (!$this->user->isAllowed($this->name, $this->action)) {
            throw new \Nette\Application\ForbiddenRequestException;
        }
    }
}