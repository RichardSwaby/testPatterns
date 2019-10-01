<?php
namespace Model\creationalPatterns;
header('Content-Type: text/plain');

class AbstractEngineDemo {
  static function execute() {
    $car1 = new Car( new StandardEngine(1300) );
    $car2 = new Car( new StandardEngine(1600) );
    $car3 = new Car( new TurboEngine(1300) );
    $car4 = new Car( new TurboEngine(1600) );
    print_r($car1); echo "\n";
    print_r($car2); echo "\n";
    print_r($car3); echo "\n";
    print_r($car4); echo "\n";

    $van1 = new Van( new StandardEngine(1800) );
    $van2 = new Van( new StandardEngine(2400) );
    $van3 = new Van( new TurboEngine(1800) );
    $van4 = new Van( new TurboEngine(2400) );
    print_r($van1); echo "\n";
    print_r($van2); echo "\n";
    print_r($van3); echo "\n";
    print_r($van4); echo "\n";
  }
}

interface Engine {
  public function getSize();
  public function isTurbo();
}

abstract class AbstractEngine implements Engine {
  private $size;
  private $turbo;

  public function __construct ( $size, $turbo) {
    $this->size = $size;
    $this->turbo = $turbo;
  }

  public function getSize() {
    return $this->size;
  }

  public function isTurbo() {
    return $this->turbo;
  }

  public function __toString() {
    return get_class($this) . '(' . (string)$this->size . ')';
  }
}


class StandardEngine extends AbstractEngine {
  public function __construct($size) {
    parent::__construct( $size, false );  // not turbocharged
  }
}

class TurboEngine extends AbstractEngine {
  public function __construct($size) {
    parent::__construct( $size, true );  // not turbocharged
  }
}

interface Vehicle {
  const UNPAINTED = "Unpainted";
  const BLUE      = "Blue";
  const BLACX     = "Black";
  const GREEN     = "Green";
  const RED       = "Red";
  const SILVER    = "Silver";
  const WHITE     = "White";
  const YELLOW    = "Yellow";

  public function getEngine();
  public function getColour();
  public function paint($colour);
}

abstract class AbstractVehicle implements Vehicle {
  private $engine;
  private $colour;

  public function __construct ( Engine $engine,
                                $colour = Vehicle::UNPAINTED) {
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

abstract class AbstractCar extends AbstractVehicle {
  public function __construct ( Engine $engine,
                                $colour = Vehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }
}

class Car extends AbstractCar {
  public function __construct ( Engine $engine,
                                 $colour = Vehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }

    public function __clone() {} // this is for prototype pattern

}

abstract class AbstractVan extends AbstractVehicle {
  public function __construct ( Engine $engine,
                                $colour = Vehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }
}

class Van extends AbstractVan{
  public function __construct ( Engine $engine,
                                 $colour = Vehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }

    public function __clone() {} // this is for prototype pattern
}
