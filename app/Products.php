<?php

namespace App;

/**
 * Model for working with products.
 *
 * @author Max Shaian
 */

class Products extends Model 
{
    /**
     * Database table name for this Model.
     * 
     * @var string 
     */
    protected $table = 'products';
    
    /**
     * Returns information about all the products.
     * 
     * @return array
     */
    public function getAll(): array
    {
        $result = parent::getAll();
        
        array_walk($result, function(&$product) {
            $product['doc_link'] = str_replace(' ', '_', strtolower($product['name']));
        });
        return $result;
    }
    
    /**
     * Returns information for downloads page.
     * 
     * @return array
     */
    public function getDownloads(): array
    {
        return $this->db
                ->table($this->table)
                ->select('id,name,download_link')
                ->fetch();
    }
    
    /**
     * Updates information about downloaded products.
     * 
     * @param int $id Id of the product
     * @return string
     */
    public function downloaded(int $id): string
    {
        $this->db
                ->table($this->table)
                ->update('download_num', ['(`download_num` + 1)'], true)
                ->where('id', $id)
                ->fetch();
        
        $link = $this->db
                        ->table($this->table)
                        ->select('download_link')
                        ->where('id', $id)
                        ->fetch(1);
        
        return $link['download_link'];
    }
}
