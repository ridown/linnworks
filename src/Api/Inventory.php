<?php

namespace Onfuro\Linnworks\Api;

class Inventory extends ApiClient
{
    public $path = 'Inventory';
  
   
    public function GetInventoryItemTitles(string $inventoryItemId = '') : array
    {
        return $this->get($this->path . '/' . __FUNCTION__, [
            "inventoryItemId" => $inventoryItemId,
        ]);
    }
    
    public function GetInventoryItemsCount(boolean $includeDeleted = false, boolean $includeArchived = false) : array
    {
        return $this->get($this->path . '/' . __FUNCTION__, [
            "includeDeleted" => $includeDeleted,
            "includeArchived" => $includeArchived,
        ]);
    }
    
    public function GetInventoryItemById(string $id = "") : array
    {
        return $this->get($this->path . '/' . __FUNCTION__, [
            "id" => $id,
        ]);
    }
    
    

}
