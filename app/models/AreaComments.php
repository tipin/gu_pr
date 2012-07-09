<?php

use Nette\Database\Table;


class AreaComments extends Model
{  
    
    public function filterBy($conditions) {
        return $this->database->table('comment')->where($conditions);
    }
    
    /**
     * @return Table\Selection 
     */
    public function filterByContentId($id)
    {
        return $this->database->table('comment')->where('area_comment:area_id = ?', $id);
    }


    /**
     * @param int $areaId
     * @param array|Traversable $data
     * @return Table\ActiveRow|FALSE
     */
    public function create($areaId, $data)
    {     
        $data['added'] = new Nette\DateTime;
        
        try {
            $this->database->beginTransaction();
            
            $comment = $this->database->table('comment')->insert($data);
            $this->database->table('area_comment')->insert(array(
                'area_id' => $areaId,
                'comment_id' => $comment->id
            ));
            
            $this->database->commit();
            
            return $comment;
            
        } catch (PDOException $exception) {
            $this->database->rollBack();
            
            return FALSE;
        }
    }
    
    
    public function edit(Table\ActiveRow $comment, $data)
    {
        return $comment->update($data);
    }

}