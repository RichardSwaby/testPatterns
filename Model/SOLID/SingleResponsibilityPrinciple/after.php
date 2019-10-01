<?php
namespace t;
header('Content-Type: text/plain');

// From apphp.com
// Instead of one class Order - containing all these methods
// split it into three classes Order, OrderRepository and OrderViewer

class SingleResponsibilityPrincipleDemo {
  static function execute() {
}

class Order
{
    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}
}

class OrderRepository
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

class OrderViewer
{
    public function printOrder($order){/*...*/}
    public function showOrder($order){/*...*/}
}
?>
