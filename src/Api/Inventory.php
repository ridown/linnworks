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
    
    public function GetInventoryItemsCount(bool $includeDeleted = false, bool $includeArchived = false) : array
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
    
    public function GetStockLocations()
    {
        return $this->get($this->path . '/' . __FUNCTION__);
    }

}
