<?php

use Nette\Database\Table;


class ArticleComments extends Model
{  
    
    public function filterBy(array $conditions) {
        return $this->database->table('comment')->where($conditions);
    }
    
    /**
     * @return Table\Selection 
     */
    public function filterByContentId($id)
    {
        return $this->database->table('comment')->where('article_comment:article_id = ?', $id);
    }


    /**
     * @param int $areaId
     * @param array|Traversable $data
     * @return Table\ActiveRow|FALSE
     */
    public function create($areaId, array $data)
    {     
        $data['added'] = new Nette\DateTime;
        
        try {
            $this->database->beginTransaction();
            
            $comment = $this->database->table('comment')->insert($data);
            $this->database->table('article_comment')->insert(array(
                'article_id' => $areaId,
                'comment_id' => $comment->id
            ));
            
            $this->database->commit();
            
            return $comment;
            
        } catch (PDOException $exception) {
            $this->database->rollBack();
            
            return FALSE;
        }
    }

    
    public function edit(Table\ActiveRow $comment, array $data)
    {
        return $comment->update($data);
    }
}