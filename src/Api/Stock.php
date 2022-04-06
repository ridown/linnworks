<?php

namespace Onfuro\Linnworks\Api;

class Stock extends ApiClient
{
    public $path = 'Stock';
    const StockLevels = 0;
    const Pricing = 1;
    const Supplier = 2;
    const ShippingInformation = 3;
    const ChannelTitle = 4;
    const ChannelDescription = 5;
    const ChannelPrice = 6;
    const ExtendedProperties = 7;
    const Images = 8;

    const SKU = 0;
    const Title = 1;
    const Barcode = 2;

    public function getStockConsumption(string $stockItemId = "", string $locationId = "", string $startDate = "", string $endDate = "")
    {
        return $this->get('Stock/GetStockConsumption', [
            "stockItemId" => $stockItemId,
            "locationId" => $locationId,
            "startDate" => $startDate,
            "endDate" => $endDate,
        ]);
    }

    public function SKUExists(string $SKU = "")
    {
        if(!empty($dataRequirements)) { $dataRequirements = json_encode($dataRequirements); }
        if(!empty($searchTypes)) { $searchTypes = json_encode($searchTypes); }

        return $this->get($this->path . '/' . __FUNCTION__, [
            "SKU" => $SKU
        ]);
    }

    public function GetStockItemsFull(string $keyWord = "",int $entriesPerPage = 100, int $pageNumber = 1, array $dataRequirements = [], array $searchTypes = [],  bool $loadCompositeParents = true, bool $loadVariationParents = true)
    {
        if(!empty($dataRequirements)) { $dataRequirements = json_encode($dataRequirements); }
        if(!empty($searchTypes)) { $searchTypes = json_encode($searchTypes); }

        return $this->get($this->path . '/' . __FUNCTION__, [
            "keyWord" => $keyWord,
            "loadCompositeParents" => $loadCompositeParents,
            "loadVariationParents" => $loadVariationParents,
            "entriesPerPage" => $entriesPerPage,
            "pageNumber" => $pageNumber,
            "dataRequirements" => $dataRequirements,
            "searchTypes" => $searchTypes,
        ]);
    }

    public function GetStockItems(string $keyWord = "",string $locationId = "",int $entriesPerPage = 100, int $pageNumber = 1, bool $excludeComposites = true, bool $excludeVariations = true, bool $excludeBatches = true)
    {
        return $this->get('Stock/GetStockItems', [
            "keyWord" => $keyWord,
            "locationId" => $locationId,
            "entriesPerPage" => $entriesPerPage,
            "pageNumber" => $pageNumber,
            "excludeComposites" => $excludeComposites,
            "excludeVariations" => $excludeVariations,
            "excludeBatches" => $excludeBatches,
        ]);
    }

    public function getStockHistory(string $stockItemId, string $locationId, int $entriesPerPage = 100, int $pageNumber = 1)
    {
        return $this->get('Stock/GetItemChangesHistory', [
            "stockItemId" => $stockItemId,
            "locationId" => $locationId,
            "entriesPerPage" => $entriesPerPage,
            "pageNumber" => $pageNumber
        ]);
    }

    public function getStockItemByKey(string $locationId = "", string $key = "") : array
    {
        return $this->get('Stock/GetStockItemsByKey', [
            "stockIdentifier" => json_encode([
                "Key" => $key,
                "LocationId" => $locationId,
            ]),
        ]);
    }

    /*
     * Update by Delta??
     */
    public function UpdateStockLevelsBySKU(string $SKU = "", string $LocationId = "", $Level) : array
    {
        return $this->get('Stock/UpdateStockLevelsBySKU', [
            "stockLevels" => json_encode([
                "SKU" => $SKU,
                "LocationId" => $locationId,
                "Level" => $Level,
            ]),
        ]);
    }
    
    /*
     * Set by Fixed ammount??
     */
    public function SetStockLevel(string $SKU = "", string $LocationId = "", $Level) : array
    {
        return $this->get('Stock/SetStockLevel', [
            "stockLevels" => json_encode([
                 "SKU" => $SKU,
                 "LocationId" => $locationId,
                 "Level" => $Level,
             ]),
        ]);
    }

}
