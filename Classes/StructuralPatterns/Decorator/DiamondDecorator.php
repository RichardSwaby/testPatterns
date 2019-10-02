<?php
namespace Classes\StructuralPatterns\Decorator;

class DiamondDecorator extends AbstractTileDecorator {
  function getWealthFactor() {
    return $this->tile->getWealthFactor()+2;
  }
}

 ?>
