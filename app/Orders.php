<?php

namespace App;

/**
 * Model for working with products.
 *
 * @author Max Shaian
 */

class Orders extends Model 
{
    /**
     * Database table name for this Model.
     * 
     * @var string 
     */
    protected $table = 'orders';
    
    /**
     * Get orders by a product id.
     * 
     * @param int $id
     */
    public function getByProductId(int $product_id): array
    {
        $result = $this->db
                ->table($this->table)
                ->select()
                ->where('product_id', $product_id)
                ->fetch();
        
        array_walk($result, function(&$value) {
            $value['data'] = json_decode($value['data'], true);
        });
        
        return $result;
    }
    
    /**
     * Returns data baset on product name.
     * 
     * @param string $name
     * @return array
     */
    public function getByName(string $name): array
    {
        return $this->db
                ->table($this->table)
                ->select('name, product_id, price, file_link')
                ->where('name', $name)
                ->fetch(1);
    }
}
