<?php

class AreaPresenter extends BasePresenter 
{
    /** @var ActiveRow */
    private $area;
    
    
    public function renderList($id)
    {
        $areas = $this->context->models->areas->filterBy(array('enabled' => TRUE));
        
        if ($id) {
            if (!in_array($id, array('rock', 'boulder', 'wall'))) {
                throw new Nette\Application\BadRequestException;
            }
            $areas->where('area_type = ?', $id);
        }
        $this->template->areas = $areas;
    }
    
    
    public function actionView($id) 
    {
        $this->area = $this->context->models->areas->findBy(array(
            'id' => $id, 
            'enabled' => TRUE
        ));
        if (!$this->area) {
            throw new Nette\Application\BadRequestException;
        }
    }
    

    public function renderView($id)
    {
        $this->template->area = $this->area;
        $this->template->rocks = $this->area->related('rock');
    }

    public function actionRoutes($id)
    {
        $this->area = $this->context->models->areas->findBy(array(
            'id' => $id, 
            'enabled' => TRUE
        ));
        if (!$this->area) {
            throw new Nette\Application\BadRequestException;
        }
    }
    

    public function renderRoutes($id)
    {
        $this->template->area = $this->area;
        $this->template->rocks = $this->area->related('rock');
    }
    
    public function renderComments($id)
    {
        
        $this->template->area = $this->area;
    }
    
    public function createComponentComments()
    {
        $comments = new CommentsControl();
        
        $comments->service = $this->context->models->areaComments;
        $comments->contentId = $this->area->id;
        
        return $comments;
    }

}