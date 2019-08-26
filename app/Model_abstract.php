<?php

namespace App;
/**
 * Main database model.
 * Uses Service\Database class for connection to a database.
 * Configure database in settings.ini file.
 *
 * @author Max Shaian
 */

use Service\Database;

abstract class Model 
{
    /**
     * Database class instance.
     * 
     * @var Service\Database; 
     */
    protected $db;
    
    public function __construct()
    {
        $this->db = Database::db();
    }
    
    /**
     * Returns information from a database.
     * 
     * @return array
     */
    public function getAll(): array
    {
        return $this->db
                ->table($this->table)
                ->select()
                ->fetch();
    }
    
    /**
     * Returns one row of the table by id
     * 
     * @return array
     */
    public function getByID($id): array
    {
        return $this->db
                ->table($this->table)
                ->select()
                ->where('id', $id)
                ->fetch(1);
    }
    
    public function count()
    {
        $result = $this->db
                ->table($this->table)
                ->select('COUNT')
                ->fetch(1);
        
        return intval($result['COUNT(*)']);
    }
}
