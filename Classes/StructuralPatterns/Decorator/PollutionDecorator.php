<?php
namespace Classes\StructuralPatterns\Decorator;

class PollutionDecorator extends AbstractTileDecorator {
  function getWealthFactor() {
    return $this->tile->getWealthFactor()-4;
  }
}
 ?>
