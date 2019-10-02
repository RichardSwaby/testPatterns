<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IVehicle;

abstract class AbstractVehicle implements IVehicle {
  private $engine;
  private $colour;

  public function __construct ( AbstractEngine $engine,
                                $colour = IVehicle::UNPAINTED) {
    $this->engine = $engine;
    $this->colour = $colour;
  }

  public function getEngine() {
    return $this->engine;
  }

  public function getColour() {
    return $this->colour;
  }

  public function paint($colour) {
    $this->colour = $colour;
  }

  public function __toString() {
    return get_class ($this) . '(' .
            (string)$this->engine . ', ' .
            (string)$this->colour . ')';
  }

  public function __clone() {} // this is for prototype pattern
}
 ?>
