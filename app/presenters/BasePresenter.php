<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter 
{
    
    public function getModels()
    {
        return $this->context->models;
    }
}