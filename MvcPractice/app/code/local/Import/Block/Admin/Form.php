<?php
class Import_Block_Admin_Form extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('import/admin/form.phtml');
    }
    public function getPendingImportList()
    {
        return Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('status', 0)
            ->addGroupBy('type')
            ->addCount('json_data', 'pending_import')
            ->getData();
    }
}
?>