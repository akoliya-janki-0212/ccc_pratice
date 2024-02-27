<?php
class Catalog_Model_Product extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Catalog_Model_Resource_Product';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Product';
    }
    public function getStatus()
    {

        $mapping = [
            1 => "Enabled",
            0 => "Disabled"
        ];
        return isset($this->_data['status'])
            ? $mapping[$this->_data['status']]
            : '';
    }
    public function getCategorys()
    {
        $categoryCollection = $this->getCollection();
        $category_name = [];
        foreach ($categoryCollection->getData() as $category) {
            $category_name[] = $category->getCategoryName();
        }
        return $category_name;
    }
    public function getCategoryNames()
    {
        $categoryName = $this->getCategorys();
        $mapping = [];
        for ($i = 0; $i < count($categoryName); $i++) {
            $mapping[$i] = $categoryName[$i];
        }
        return isset($this->_data['category_name'])
            ? $mapping[$this->_data['category_name']]
            : '';
    }
}
?>