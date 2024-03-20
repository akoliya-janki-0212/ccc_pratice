<?php
class Sales_Controller_Order extends Core_Controller_Front_Action
{
    public function saveAction()
    {
        $statusData = $this->getRequest()->getParams('order');
        $orderModel = Mage::getModel('sales/order')->load($statusData['order_id']);
        $orderModel->addStatusHistory($statusData);
        $id = $orderModel->addData('status', $statusData['to_status'])
            ->save()->getId();
        $this->setRedirect('admin/order/view?id=' . $id);
    }
}