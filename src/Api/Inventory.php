<?php

namespace Onfuro\Linnworks\Api;

class Inventory extends ApiClient
{
    public $path = 'Inventory';
  
   
    public function GetInventoryItemTitles(string $inventoryItemId = '') : array
    {
        return $this->get($this->path . '/GetInventoryItemTitles', [
            "inventoryItemId" => $inventoryItemId,
        ]);
    }
    
    public function GetInventoryItemsCount(boolean $includeDeleted = false, boolean $includeArchived = false) : array
    {
        return $this->get($this->path . '/GetInventoryItemsCount', [
            "includeDeleted" => $includeDeleted,
            "includeArchived" => $includeArchived,
        ]);
    }
    
    public function GetInventoryItemById(string $id = "") : array
    {
        if(!empty($id)) 
        {
            return $this->get($this->path . '/GetInventoryItemById', [
                "id" => $id,
            ]);
        } 
        else 
        {
            return [];
        }
    }
    
    

}
