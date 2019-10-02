<?php
namespace Classes\StructuralPatterns\Decorator;

class Plains extends AbstractTile {
  private $wealthfactor = 2;
  function getWealthFactor() {
    return $this->wealthfactor;
  }
}
 ?>
