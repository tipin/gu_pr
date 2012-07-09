<?php

use Nette\Database\Table;


class Areas extends Model
{  
    
    public function filterBy($conditions)
    {
        return $this->database->table('area')->where($conditions);
    }
    
    
    /**
     * @return Nette\Database\Table\Selection 
     */
    public function getAll()
    {
        return $this->database->table('area');
    }

    
    /**
     * @return Table\Selection 
     */
    public function filterByUserId($id)
    {
        return $this->database->table('area')->where('area_user:user_id = ?', $id);
    }
    
    
    public function create($data)
    {
    }
    
    
    public function edit(Table\ActiveRow $user, array $data)
    {
    }
}