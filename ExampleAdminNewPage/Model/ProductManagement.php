<?php 
namespace Dolphin\ExampleAdminNewPage\Api;

interface ProductManagementInterface
{
    /**
     * Get list of products.
     *
     * @return \Vendor\Module\Api\Data\ProductInterface[]
     */
    public function getList();

    /**
     * Get product by id.
     *
     * @param int $productId
     * @return \Vendor\Module\Api\Data\ProductInterface
     */
    public function getById($productId);
}
