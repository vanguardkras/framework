<?php

namespace App;

/**
 * Model for working with products.
 *
 * @author Max Shaian
 */

class Blog extends Model 
{
    /**
     * Database table name for this Model.
     * 
     * @var string 
     */
    protected $table = 'blog';
    
    public function getAllForPage()
    {
        $page = $_GET['page'] ?? '1';
        $limit = setting('per_page');
        
        return $this->db
                        ->table($this->table)
                        ->select('id, header, preview, publish_date')
                        ->order('id', 'DESC')
                        ->limit($limit, $limit * ($page - 1))
                        ->fetch();
    }
    
}
