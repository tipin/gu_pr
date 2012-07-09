<?php

use Nette\Database\Table;


class Routes extends Model
{  
    
    public function filterBy($conditions)
    {
        return $this->database->table('route')->where($conditions);
    }
    
    
    public function create($data)
    {
    }
    
    
    public function edit(Table\ActiveRow $user, array $data)
    {
    }
}