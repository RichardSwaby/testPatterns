<?php
namespace t;
header('Content-Type: text/plain');

// Rather than having one big interface which is implemented by many classes but
// which has some things which are not used by some of the classes we should split
// the interface into smaller interfaces.

// no client should be forced to depend on methods it does not use. ISP splits
// interfaces that are very large into smaller and more specific ones so that
// clients will only have to know about the methods that are of interest to them.


class InterfaceSegregationPrincipleDemo {
  static function execute() {
}

interface IItem
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);

    public function setColor($color);
    public function setSize($size);

    public function setCondition($condition);
    public function setPrice($price);
}
?>
