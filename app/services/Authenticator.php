<?php

use Nette\Security;


class Authenticator extends Nette\Object implements Security\IAuthenticator
{
    
    /** @var Users */
    private $users;
    
    
    public function __construct(Users $users)
    {
        $this->users = $users;
    }


    public function authenticate(array $credentials)
    {
        list($username, $password) = $credentials;
        $user = $this->users->findBy(array('username' => $username));
        
        if (!$user) {
            throw new Security\AuthenticationException("Uživatel '$username' nenalezen.", 
                    self::IDENTITY_NOT_FOUND);
        }
        
        if ($user->password != sha1($password)) {
            throw new Security\AuthenticationException('Neplatné heslo.', 
                    self::INVALID_CREDENTIAL);
        }
        
        $identity = new Security\Identity($user->id, $user->role);
        $identity->username = $user->username;
        
        return $identity;
    }
}