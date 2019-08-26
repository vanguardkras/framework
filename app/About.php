<?php

namespace App;

/**
 * Model for processing about me infromation
 *
 * @author Max Shaian
 */

class About extends Model 
{
    protected $table = 'about';
    
    public function get()
    {
        return $this->db
                ->table($this->table)
                ->select()
                ->where('id', 1)
                ->fetch(1);
    }
}
