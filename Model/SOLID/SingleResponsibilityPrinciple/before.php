<?php
namespace t;
header('Content-Type: text/plain');

// From apphp.com
// this class performs the operation for 3 different types of tasks
// with every order:
// - calculateTotalSum (getItems, getItemsCount, addItem, deleteItem),
// - display order (printOrder, showOrder)
// - and data handling (load, save, update, delete).

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

    public function printOrder(){/*...*/}
    public function showOrder(){/*...*/}

    public function load(){/*...*/}
    public function save(){/*...*/}
    public function update(){/*...*/}
    public function delete(){/*...*/}
}
?>
