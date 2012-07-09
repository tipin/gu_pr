<?php

use Nette\Application\UI;


class CommentsControl extends UI\Control 
{
    
    private $contentId;
    
    /** @var Model */
    private $service;
    
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;
    }
    
    public function setService($service)
    {
        $this->service = $service;
    }
    
    
    public function render()
    {
        /** @var Nette\Database\Table\Selection */
        $comments = $this->service->filterByContentId($this->contentId);
        $this->template->comments = $comments->where('enabled = ?', TRUE)
                ->order('posted');
                
        $this->template->setFile(__DIR__ . '/CommentsControl.latte');
        $this->template->render();
    }
    
    
    protected function createComponentAddCommentForm()
    {
        $form = new UI\Form;
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Tvé jméno je povinný údaj.');
        $form->addTextArea('text', 'Kometář:')
                ->setRequired('Text komentáře je povinný údaj.');
        $form->addSubmit('send', 'Přidat komentář');
        
        $form->onSuccess[] = callback($this, 'processAddCommentForm');
        
        if ($this->presenter->user->isLoggedIn()) {
            $form['username']->setValue($this->presenter->user->identity->username);
        }
        
        return $form;
    }
    
    public function processAddCommentForm(UI\Form $form)
    {
        $data = $form->getValues();
        
        if ($this->presenter->user->isLoggedIn()) {
            $data['user_id'] = $this->presenter->user->id;
            $data['posted'] = new Nette\DateTime;
            $data['enabled'] = TRUE;
        }
        
        if ($this->service->create($this->contentId, $data)) {
            $this->flashMessage('Váš komentář byl uložen. Pokud nejste registrovaný uživatel, bude zobrazen až po autorizaci adminy.');
            
        } else {
            $this->flashMessage('Vložení komentáře se nepovedlo. Zkuste to prosím později.', 'error');
        }
        $this->redirect('this');
    }
    
}