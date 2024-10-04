<?php
namespace Kitchen365\OrderStatus\Plugin\Sales\Model\ResourceModel\Order\Handler;

use Magento\Sales\Model\Order;
use Magento\Sales\Model\ResourceModel\Order\Handler\State;

class StatePlugin
{
    public function afterCheck(State $subject, $result, Order $order)
    { 
        if ($order->getState() == Order::STATE_PROCESSING && !$order->hasInvoices()) {
            $order->setState(Order::STATE_COMPLETE)
                ->setStatus($order->getConfig()->getStateDefaultStatus(Order::STATE_COMPLETE));
        } 
        
        return $result;
    }
}