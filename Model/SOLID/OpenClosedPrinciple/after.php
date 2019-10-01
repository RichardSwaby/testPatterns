<?php
namespace t;
header('Content-Type: text/plain');

// The class should be open to extension but closed to modification

// In more simple words it can be described as - all classes, functions, etc
// should be designed so that to change their behaviour, we do not need to
// modify their source code.

// From apphp.com

// In this example we are loading from a mySQL database but what if we wanted
// to load via API from a third party?

// We establish interface IOrderSource, which will be implemented by the
// respective classes MySQLOrderSource, ApiOrderSource and so on.

class OpenClosedPrincipleDemo {
  static function execute() {
}

class OrderRepository
{
    private $source;

    public function setSource(IOrderSource $source)
    {
        $this->source = $source;
    }

    public function load($orderID)
    {
        return $this->source->load($orderID);
    }

    public function save($order){/*...*/}
    public function update($order){/*...*/}
}

interface IOrderSource
{
    public function load($orderID);
    public function save($order);
    public function update($order);
    public function delete($order);
}

class MySQLOrderSource implements IOrderSource
{
    public function load($orderID);
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

class ApiOrderSource implements IOrderSource
{
    public function load($orderID);
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}
?>
