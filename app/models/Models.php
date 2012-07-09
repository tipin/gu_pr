<?php

use Nette\Database\Connection;


abstract class Model extends Nette\Object
{
    /** @var Nette\Database\Connection */
    protected $database;
    
    
    /**
     * @param array|Traversable $data
     * @return Nette\Database\Table\Selection 
     */
    abstract function filterBy($conditions);


    public function __construct(Connection $database)
    {
        $this->database = $database;
    }

    
    /**
     * @param array|Traversable $data
     * @return Nette\Database\Table\ActiveRow 
     */
    public function findBy($conditions)
    {
        return $this->filterBy($conditions)->fetch();
    }
    
    
    public function remove(Table\ActiveRow $row)
    {
        return $row->delete();
    }
}