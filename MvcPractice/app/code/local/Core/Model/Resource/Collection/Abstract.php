<?php
class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_model = null;
    protected $_select = [];
    protected $_data = [];
    public function __construct()
    {

    }
    public function setResource($resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModel($model)
    {
        $this->_model = $model;
        return $this;
    }
    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        $this->_select['WHERE'][$field][] = $value;
        return $this;
    }
    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['FROM']}";
        if (isset($this->_select['WHERE'])) {
            $whereCondition = [];
            foreach ($this->_select['WHERE'] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(
                                function ($v) {
                                    return "'{$v}'";
                                }
                                ,
                                $_v
                            );
                            $_v = implode(',', $_v);
                        }
                        switch ($condition) {
                            case 'eq':
                                $whereCondition[] = "{$column}='{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} in ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} like '{$_v}'";
                                break;
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(' AND ', $whereCondition);
        }
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            // $this->_data[] = Mage::getModel('catalog/category')->setData($row);
            $modelObj = new $this->_model;
            $this->_data[] = $modelObj->setData($row);
        }
    }
    public function getData()
    {
        $this->load();
        return $this->_data;
    }
}
?>