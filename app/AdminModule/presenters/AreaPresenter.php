<?php

namespace AdminModule;


class AreaPresenter extends BasePresenter
{
    
    public function renderDefault($id)
    {
        if ($this->user->isInRole('admin')) {
            $areas = $this->context->models->areas->all;
        } else {
            $areas = $this->context->models->areas->filterByUserId($this->user->id);
        }
        
        $this->template->areas = $areas->order('name');
    }
    
    
    public function renderEdit($id)
    {        
        $this->template->area = $this->areaById($id);
    }
    
    
    private function areaById($id) {
        $area = $this->context->models->areas->findBy(array('id' => $id));
        if (!$area) {
            throw new \Nette\Application\BadRequestException;
        }
        if (!$area->related('user')->where('user_id = ?', $this->user->id)->count()
                && !$this->user->isInRole('admin')) {
            throw new \Nette\Application\ForbiddenRequestException;
        }
        
        return $area;
    }
}