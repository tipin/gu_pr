<?php

use Nette\Database\Table;

class Forums extends Model
{  
    
   public function getAll()
   {
    return $this->database->table('forum');
   }
   
   public function filterBy($conditions)
   {
        return $this->database->table('forum')->order($conditions);
   }
       
}