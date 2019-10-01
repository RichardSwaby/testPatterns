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

class OpenClosedPrincipleDemo {
  static function execute() {
}

class OrderRepository
{
    public function load($orderID)
    {
        $pdo = new PDO(
            $this->config->getDsn(),
            $this->config->getDBUser(),
            $this->config->getDBPassword()
        );
        $statement = $pdo->prepare("SELECT * FROM `orders` WHERE id=:id");
        $statement->execute(array(":id" => $orderID));
        return $query->fetchObject("Order");
    }

    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}
?>
