<?php

use Nette\Application\UI\Form;


class AccountPresenter extends BasePresenter 
{
    /** @persistent */
    public $backlink;
    
    /** @var Nette\Database\Table\ActiveRow */
    private $account;
    
    
    public function actionDefault()
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('login', array('backlink' => $this->storeRequest()));
        }
        
        $this->account = $this->models->users->findBy(array('id' => $this->user->id));
        if (!$this->account) {
            throw new Nette\Application\ForbiddenRequestException;
        }
    }
    
    
    public function actionCreate()
    {
        if ($this->user->isLoggedIn()) {
            $this->redirect('default');
        }
    }
    
    
    protected function createComponentAccountForm()
    {
        $form = new Form;
        $form->addText('email', 'Email:')
                ->setRequired('Nezadal(a) jsi svou emailovou adresu.')
                ->addRule(Form::EMAIL, 'Nezadal(a) jsi platnou emailovou adresu.');
        $form->addText('club', 'Lezecký oddíl:');
        $form->addSubmit('send', 'Editovat');
        
        $form->setDefaults($this->account);
        
        $form->onSuccess[] = callback($this, 'processAccountForm');
        
        return $form;
    }
    
    public function processAccountForm(Form $form)
    {
        $values = $form->getValues();
        try {
            $this->models->users->edit($this->account, $values);
            
            $this->flashMessage('Tvůj účet byl úspěšně editován.', 'success');
            $this->redirect('this');

        } catch (Nette\InvalidArgumentException $e) {
            $form->addError($e->getMessage());
        }
    }
    
    
    protected function createComponentPasswordForm() 
    {        
        $form = new Form;
        $form->addPassword('password', 'Nové heslo:')
                ->setRequired('Nezadal(a) jsi nové heslo.')
                ->addRule(Form::MIN_LENGTH, 'Tvé heslo musí mít alespoň 3 znaky.', 3);
        $form->addPassword('verifyPassword', 'Nové heslo (znovu):')
                ->addRule(Form::EQUAL, 'Zadaná hesla se neshodují.', $form['password']);
        $form->addSubmit('send', 'Změnit heslo');
        
        $form->onSuccess[] = callback($this, 'processPasswordForm');
        
        return $form;
    }
    
    public function processPasswordForm(Form $form)
    {
        $values = $form->getValues();
        unset($values['verifyPassword']);

        try {
            $this->models->users->edit($this->account, $values);

            $this->flashMessage('Hotovo. Tvé heslo bylo změněno.', 'success');
            $this->redirect('this');

        } catch (Nette\InvalidArgumentException $e) {
            $form->addError($e->getMessage());
        }
    }
    
    
    protected function createComponentRegisterForm()
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Nezadal(a) jsi své uživatelské jméno.')
                ->addRule(callback($this, 'verifyUsername'), 'Toto uživatelské jméno již někdo používá. Zvol si prosím jiné.');
        $form->addText('email', 'Email:')
                ->setRequired('Nezadal(a) jis svou emailovou adresu.')
                ->addRule(Form::EMAIL, 'Nezadal(a) jsi platnou emailovou adresu.');
        $form->addPassword('password', 'Heslo:')
                ->setRequired('Nezadal(a) jsi své heslo.')
                ->addRule(Form::MIN_LENGTH, 'Tvé heslo musí mít alespoň 3 znaky.', 3);
        $form->addPassword('verifyPassword', 'Heslo (znovu):')
                ->addRule(Form::EQUAL, 'Zadaná hesla se neshodují.', $form['password']);
        $form->addSubmit('send', 'Založit účet');
        
        $presenter = $this;
        $form->onSuccess[] = function($form) use ($presenter) {
            $values = $form->getValues();
            unset($values['verifyPassword']);
            
            try {
                $user = $presenter->models->users->create($values);
                if ($user) {
                    $presenter->flashMessage('Super! Byl ti vytvořen účet. Můžeš pokračovat přihlášením.', 'success');
                    $presenter->redirect('login');
                    
                } else {
                    $presenter->flashMessage('Registrace se poněkud nepovedla :(', 'warning');
                }
                
            } catch (Nette\InvalidArgumentException $e) {
                $form->addError($e->getMessage());
            }
        };
        
        return $form;
    }
    
    public function verifyUsername($item)
    {
        $users = $this->models->users->filterBy(array('username' => $item->value));   
        return $users->count() == 0;
    }


    protected function createComponentLoginForm()
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Nevyplnil(a) jsi své uživatelské jméno.');
        $form->addPassword('password', 'Heslo:')
                ->setRequired('Nevyplnil(a) jsi své heslo.');
        $form->addCheckbox('remember', 'Pamatuj si mě na tomto počítači');
        $form->addSubmit('send', 'Přihlásit se');
        
        $presenter = $this;
        $form->onSuccess[] = function($form) use ($presenter) {
            try {
                $values = $form->getValues();
                if ($values->remember) {
                    $presenter->user->setExpiration('+ 14 days', FALSE);
                } else {
                    $presenter->user->setExpiration('+ 20 minutes', TRUE);
                }
                $presenter->user->login($values->username, $values->password);
                
                $presenter->restoreRequest($presenter->backlink);
                $presenter->redirect('Homepage:');
        
            } catch (Nette\Security\AuthenticationException $e) {
                $form->addError($e->getMessage());
            }
        };
        
        return $form;
    }
    
    
    public function actionLogout()
    {
        $this->user->logout();
        $this->flashMessage('Právě jsi byl(a) odhlášen(a).');
        $this->redirect('login');
    }
    
}