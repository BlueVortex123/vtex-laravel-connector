<?php

namespace App\Configs;

abstract class VtexConfig
{
    //* Vtex API Path Params.

    //* Products functions
    const ENDPOINT_GET_PRODUCT = '/api/catalog/pvt/product/:ID_PRODUCT';
    const ENDPOINT_GET_PRODUCT_CONTEXT_BY_ID = '/api/catalog_system/pvt/products/productget/:ID_PRODUCT';
    const ENDPOINT_GET_PRODUCT_CONTEXT_BY_REFID = '/api/catalog_system/pvt/products/productgetbyrefid/:REF_ID';
    
    const ENDPOINT_CREATE_PRODUCT = '/api/catalog/pvt/product';
    const ENDPOINT_UPDATE_PRODUCT = '/api/catalog/pvt/product/:ID_PRODUCT';
    const ENDPOINT_ADD_PRODUCT_SIMILAR_CATEGORY = '/api/catalog/pvt/product/:ID_PRODUCT/similarcategory/:ID_CATEGORY';

    // * SKU functions
    const ENDPOINT_GET_SKU = '/api/catalog/pvt/stockkeepingunit/:ID_SKU';
    const ENDPOINT_CREATE_SKU = '/api/catalog/pvt/stockkeepingunit';
    const ENDPOINT_UPDATE_SKU = '/api/catalog/pvt/stockkeepingunit/:ID_SKU';
    const ENDPOINT_CREATE_SKU_FILE = '/api/catalog/pvt/stockkeepingunit/:ID_SKU/file';
    const ENDPOINT_GET_SKU_CONTEXT_BY_ID = '/api/catalog_system/pvt/sku/stockkeepingunitbyid/:ID_SKU';
    
    const ENDPOINT_UPDATE_STOCK = '/api/logistics/pvt/inventory/skus/:ID_SKU/warehouses/:ID_WAREHOUSE';
    const ENDPOINT_UPDATE_PRICE = '/pricing/prices/:ID_ITEM';
    
    const ENDPOINT_CREATE_EAN_SKU = '/api/catalog/pvt/stockkeepingunit/:ID_SKU/ean/:EAN';
    const ENDPOINT_COPY_SKU_FILE_TO_SKU = '/api/catalog/pvt/stockkeepingunit/copy/:ID_SKU_FROM/:ID_SKU_TO/file/';

    const ENDPOINT_ASSOCIATE_SKU_SPECIFICATIONS_BY_GNAME = '/api/catalog/pvt/stockkeepingunit/:ID_SKU/specificationvalue';
    
    // * Brands functions
    const ENDPOINT_GET_BRANDS = '/api/catalog_system/pvt/brand/list';
    const ENDPOINT_UPDATE_BRAND = '/api/catalog/pvt/brand/:ID_BRAND';
    

    // * Category functions
    const ENDPOINT_CREATE_CATEGORY = '/api/catalog/pvt/category';
    const ENDPOINT_GET_CATEGORY_BY_ID = '/api/catalog/pvt/category/:ID_CATEGORY';
    const ENDPOINT_UPDATE_CATEGORY_BY_ID = '/api/catalog/pvt/category/:ID_CATEGORY';

    // * Specification functions
    // WIP
    

    // Geters and Seters functions for vtex current domain credentials.
    private $appKey;
    private $appToken;
    private $apiUrl;

    public function setAppKey($key)
    {
        $this->appKey = $key;
    }

    public function getAppKey()
    {
        return $this->appKey;
    }

    public function setAppToken($token)
    {
        $this->appToken = $token;
    }

    public function getAppToken()
    {
        return $this->appToken;
    }

    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl()
    {
        return $this->apiUrl;
    }
}