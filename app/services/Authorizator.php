<?php

use Nette\Security;


class Authorizator extends Security\Permission
{
    
    public function __construct() {
        
        $this->addRole('guest');
        $this->addRole('member', 'guest');
        $this->addRole('editor', 'member');
        $this->addRole('admin');
        
        $this->addResource('Admin:Dashboard');
        $this->addResource('Admin:Article');
        $this->addResource('Admin:Area');
        $this->addResource('Admin:Route');
        $this->addResource('Admin:User');
        
        $this->allow(array('editor', 'admin'), Security\Permission::ALL, Security\Permission::ALL);
        
        $this->deny('editor', 'Admin:User');
    }
}