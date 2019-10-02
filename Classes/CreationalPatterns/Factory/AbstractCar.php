<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IVehicle;

abstract class AbstractCar extends AbstractVehicle {
  public function __construct ( AbstractEngine $engine,
                                $colour = IVehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }
}
 ?>
