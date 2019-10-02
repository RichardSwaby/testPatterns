<?php
namespace Classes\StructuralPatterns\Decorator;

abstract class AbstractTileDecorator extends AbstractTile {
  protected $tile;
  function __construct(AbstractTile $tile) {
    $this->tile = $tile;
  }
}
 ?>
