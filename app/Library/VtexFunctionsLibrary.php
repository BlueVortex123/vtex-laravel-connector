<?php

namespace App\Library;

use App\Configs\VtexConfig;
use GuzzleHttp\RequestOptions;

class VtexFunctionsLibrary extends VtexConfig
{
    // Use vtex current credentials for api calls.
    protected $guzzleHttp;

    public function __construct()
    {
        $this->setApiUrl(config('vtex_credentials.api_url'));
        $this->setAppKey(config('vtex_credentials.app_key'));
        $this->setAppToken(config('vtex_credentials.app_token'));
    }

    // Headers data for submit Api calls.
    public function submitRequest(string $method, string $url, array $options = [])
    {
        $this->guzzleHttp = new \GuzzleHttp\Client([
            'headers' => [
                'X-VTEX-API-AppKey' => $this->getAppKey(),
                'X-VTEX-API-AppToken' => $this->getAppToken()
            ],
        ]);
        return $this->guzzleHttp->request($method, $url, $options);
    }

    // Get information for a Vtex Product by its Vtex ID.
    public function getProductById(string $vtexProductId): array
    {
        $endpoint = str_replace(':ID_PRODUCT', $vtexProductId, $this::ENDPOINT_GET_PRODUCT);
        $response = $this->submitRequest('GET',  $this->getApiUrl() . $endpoint);
        return json_decode($response->getBody()->getContents(), true);
    }

    // Get information for a Vtex Product by its Vtex ID.
    public function getProductByRefId(string $vtexProductRefId): ?array
    {
        $endpoint = str_replace(':REF_ID', $vtexProductRefId, $this::ENDPOINT_GET_PRODUCT_CONTEXT_BY_REFID);
        $response = $this->submitRequest('GET',  $this->getApiUrl() . $endpoint);
        return json_decode($response->getBody()->getContents(), true);
    }

    // Create Vtex Product with informations from request body.
    public function createProducts($body_data): array
    {
        $request = $this->submitRequest('POST', $this->getApiUrl() . $this::ENDPOINT_CREATE_PRODUCT, [RequestOptions::JSON => $body_data]);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }

    // Update a specific product with informations given in body request using its Vtex ID.
    public function updateProducts($body_data, string $vtexProductId): array
    {
        $endpoint = str_replace(':ID_PRODUCT', $vtexProductId, $this::ENDPOINT_UPDATE_PRODUCT);
        $request = $this->submitRequest('PUT', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }

    // Get Sku (Product Variation) by its Vtex Sku ID.
    public function getSkuById(string $vtexSkuId): array
    {
        $endpoint = str_replace(':ID_SKU', $vtexSkuId, $this::ENDPOINT_GET_SKU);
        $request = $this->submitRequest('GET', $this->getApiUrl() . $endpoint);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }

    // Create Vtex Sku with informations from request body.
    public function createSkus($body_data): array
    {
        $request = $this->submitRequest('POST', $this->getApiUrl() . $this::ENDPOINT_CREATE_SKU, [RequestOptions::JSON => $body_data]);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }


    // Create Image file photo (SkuFile) for a specific Sku, with data given in body request and its Sku Vtex ID.
    public function createSkuFile($body_data, string $vtexSkuId): array
    {
        $endpoint = str_replace(':ID_SKU', $vtexSkuId, $this::ENDPOINT_CREATE_SKU_FILE);
        $request = $this->submitRequest('POST', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
        return json_decode($request->getBody()->getContents(), true);
    }


    // Update Sku stock and inventory status with data given in body request using ID of Warehouse and Vtex Sku ID,.
    public function exportInventory($body_data, string $vtexSkuId, string $warehouse_id): void
    {
        $endpoint = str_replace([':ID_SKU', ':ID_WAREHOUSE'], [$vtexSkuId, $warehouse_id], $this::ENDPOINT_UPDATE_STOCK);
        $this->submitRequest('PUT', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
    }

    // Update Sku pricing values by given data in body request and using ID of the Sku.
    public function exportPrices($body_data, string $vtexSkuId): void
    {
        $endpoint = str_replace(':ID_ITEM', $vtexSkuId, $this::ENDPOINT_UPDATE_PRICE);
        $this->submitRequest('PUT', 'https://api.vtex.com/' . $this->domain . $endpoint, [RequestOptions::JSON => $body_data]);
    }

    // Associate all sku files with all attributes from a sku to another sku by their Vtex ID.
    public function copySkuFilesToSku(string $vtexSkuIdFrom, string $vtexSkuIdTo): array
    {
        $endpoint = str_replace([':ID_SKU_FROM', ':ID_SKU_TO'], [$vtexSkuIdFrom, $vtexSkuIdTo], $this::ENDPOINT_COPY_SKU_FILE_TO_SKU);
        $request = $this->submitRequest('PUT', $this->getApiUrl() . $endpoint);
        return json_decode($request->getBody()->getContents(), true);
    }

    // Create or Update an group of specifications values with one or many values from body request and associate the values coresponding to given Vtex Sku ID.
    public function exportSkuSpecifications($body_data, string $vtexSkuId): array
    {
        $endpoint = str_replace(':ID_SKU', $vtexSkuId, $this::ENDPOINT_ASSOCIATE_SKU_SPECIFICATIONS_BY_GNAME);
        $request = $this->submitRequest('PUT', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
        return json_decode($request->getBody()->getContents(), true);
    }


    public function getCategory(string $vtexcategory_id): array
    {
        $endpoint = str_replace(':ID_CATEGORY', $vtexcategory_id, $this::ENDPOINT_GET_CATEGORY_BY_ID);
        $response = $this->submitRequest('GET',  $this->getApiUrl() . $endpoint);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateCategory(string $vtexcategory_id, $body_data): array
    {
        $endpoint = str_replace(':ID_CATEGORY', $vtexcategory_id, $this::ENDPOINT_UPDATE_CATEGORY_BY_ID);
        $request = $this->submitRequest('PUT', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }

    public function getBrandList(): array
    {
        $request = $this->submitRequest('GET', $this->getApiUrl() . $this::ENDPOINT_GET_BRANDS);
        return json_decode(mb_convert_encoding($request->getBody()->getContents(), 'UTF-8', 'Windows-1252'), true);
    }

    public function updateBrand(array $body_data, string $vtexBrandId): array
    {
        $endpoint = str_replace(':ID_BRAND', $vtexBrandId, $this::ENDPOINT_UPDATE_BRAND);
        $request = $this->submitRequest('PUT', $this->getApiUrl() . $endpoint, [RequestOptions::JSON => $body_data]);
        return json_decode($request->getBody()->getContents(), true);
    }

    public function getProductContextById(string $vtex_productId): array
    {
        $endpoint = str_replace(':ID_PRODUCT', $vtex_productId, $this::ENDPOINT_GET_PRODUCT_CONTEXT_BY_ID);
        $request = $this->submitRequest('GET', $this->getApiUrl() . $endpoint);
        return json_decode($request->getBody()->getContents(), true);
    }

    public function getSkuContextById(string $vtex_skuid): ?array
    {
        $endpoint = str_replace(':ID_SKU', $vtex_skuid, $this::ENDPOINT_GET_SKU_CONTEXT_BY_ID);
        $request = $this->submitRequest('GET', $this->getApiUrl() . $endpoint);
        return json_decode($request->getBody()->getContents(), true);
    }
}
