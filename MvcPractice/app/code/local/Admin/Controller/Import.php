<?php
class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    const SUCCESS_STATUS = 1;
    const ERROR_STATUS = 2;
    public function formAction()
    {
        $this->includeAdminCss('import.css');
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('import.js');
        $layout->getChild('head')->addJs('jquery-3.7.1.js');
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $importForm = $layout->createBlock('import/admin_form');
        $mainChild->addChild('form', $importForm);
        $layout->toHtml();

    }
    public function readAction()
    {
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );
        if (!empty ($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {
            $file = fopen($_FILES['file']['tmp_name'], 'r');
            $columns = fgetcsv($file);
            // Parse data from CSV file line by line
            while ($fileData = fgetcsv($file)) {
                $data = array_combine($columns, $fileData);
                $jsonData = json_encode($data);
                Mage::getModel('import/import')
                    ->addData('json_data', $jsonData)
                    ->addData('type', 'product')
                    ->save();
            }
            fclose($file);
            $this->setRedirect('admin/import/form');
        }
    }
    public function importAction()
    {
        $type = $this->getRequest()->getParams('type');
        $importCollection = Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('type', $type)
            ->addFieldToFilter('status', 0)->
            getFirstItem();
        $id = Mage::getModel('catalog/product')
            ->setData(json_decode($importCollection->getJsonData(), true))
            ->save()
            ->getId();
        if ($id) {
            $importCollection->addData('status', self::SUCCESS_STATUS)
                ->save();
            echo 'true';
        } else {

            $importCollection->addData('status', self::ERROR_STATUS)
                ->save();
            echo 'false';
        }
    }
}
?>

<?php

/* class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    public function formAction()
    {
    }
    public function saveAction()
    {
        if (isset ($_POST['submit'])) {
            $fileData = $_FILES['import_file']['name'];
            $tmp_name = $_FILES['import_file']['tmp_name'];
            $folder = "media/import/" . $fileData;
            move_uploaded_file($tmp_name, $folder);
        }
        $this->setRedirect('admin/import/list');
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("import/list.css");
        $banner = $layout->createBlock("import/list");
        $layout->getChild("content")
            ->addChild('list', $banner);
        $layout->toHtml();
    }
    public function readAction()
    {
        $file = $this->getRequest()->getParams('file');
        $file = Mage::getBaseDir('media/import/') . $file;

        $file = fopen($file, 'r');
        $column = fgetcsv($file);
        while ($data = fgetcsv($file)) {
            $data = array_combine($column, $data);
            $data = json_encode($data);
            Mage::getModel('import/import')
                ->addData('json', $data)
                ->addData('type', 'product')
                ->save();
        }
        fclose($file);
        $this->setRedirect('admin/import/readedlist');
    }
    public function readedlistAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")
            ->addCss("import/list.css");
        $layout->getChild("head")
            ->addJs("import/list.js");
        $banner = $layout->createBlock("import/readedlist");
        $layout->getChild("content")
            ->addChild('readedlist', $banner);
        $layout->toHtml();
    }
    public function importAction()
    {
        $type = $this->getRequest()->getParams('type');

        $importItem = Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('type', $type)
            ->addFieldToFilter('status', 0)
            ->getFirstItem();
        $product = Mage::getModel('catalog/product')
            ->setData(json_decode($importItem->getJson(), true))
            ->save()
            ->getId();
        if ($product) {
            $importItem->addData('status', 1)->save();
            echo "true";
        } else {
            echo "false";
        }
    }

} */
?>