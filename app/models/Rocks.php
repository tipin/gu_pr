<?php

use Nette\Database\Table;


class Rocks extends Model
{  
    
    public function filterBy(array $conditions)
    {
        return $this->database->table('rock')->where($conditions);
    }
    
    
    public function create(array $data)
    {
    }
    
    
    public function edit(Table\ActiveRow $rock, array $data)
    {
    }
}