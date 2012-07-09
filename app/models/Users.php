<?php

use Nette\Database\Table;


class Users extends Model
{  
    
    public function filterBy($conditions)
    {
        return $this->database->table('user')->where($conditions);
    }
    
    
    public function create($data)
    {   
        $data['password'] = sha1($data['password']);
        
        return $this->database->table('user')->insert($data);
    }
    
    
    public function edit(Table\ActiveRow $user, $data)
    {     
        if (isset($data['password'])) {
            $data['password'] = sha1($data['password']);
        }
        
        return $user->update($data);
    }
}