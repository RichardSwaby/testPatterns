<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IVehicle;

abstract class AbstractVan extends AbstractVehicle {
  public function __construct ( AbstractEngine $engine,
                                $colour = IVehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }
}
 ?>
