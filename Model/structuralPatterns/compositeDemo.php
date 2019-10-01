<?php
namespace Model\structuralPatterns;
header('Content-Type: text/plain');

// A simple inheritance tree whose objects can be joined at runtime to form
// structures that are also trees, but are orders of magnitude more flexible
// and complex. Multiple objects that share a single interface to the world.

class compositeDemo {

    static function execute() {
    // create an army
    $main_army = new Army();

    // add some units
    $troopCarrier = new TroopCarrier();
    $main_army->addUnit( $troopCarrier );
    $main_army->addUnit( new Archer() );
    $main_army->addUnit( new Archer() );
    $main_army->addUnit( new LaserCannonUnit() );
    // $troopCarrier->addUnit( new Cavalry() );
    echo "Main Army: ";
    print_r($main_army);
    echo "\n";

    //create a new army
    $sub_army = new Army();


    // add some units
    $sub_army->addUnit( new Archer() );
    $sub_army->addUnit( new Archer() );
    $sub_army->addUnit( new Archer() );
    echo "Sub Army: ";
    print_r($sub_army);
    echo "\n";

    UnitScript::joinExisting( $sub_army, $main_army );
    echo "Joint forces: ";
    print_r($main_army);
    echo "\n";

    // all the calculations handled behind the scenes
    print "attacking with strength: {$main_army->bombardStrength()}\n";
    }
}

abstract class Unit {
  function getComposite() {
      return null;
  }

  abstract function bombardStrength();
}


abstract class CompositeUnit extends Unit{
  private $units = array();

  function getComposite() {
    return $this;
  }

  protected function units() {
    return $this->units;
  }

  function addUnit( Unit $unit ) {
    if (in_array( $unit, $this->units, true) ) {
      return;
    }
    $this->units[] = $unit;
  }

  function removeUnit( Unit $unit) {
    $units = array();
    foreach( $this->units as $thisunit ) {
      if ( $unit !== $thisunit) {
        $units[] = $thisunit;
      }
    }
    $this->units = $units;
  }
}

class Army extends CompositeUnit{

  function bombardStrength() {
    $ret = 0;
    foreach( $this->units() as $unit ) {
      $ret += $unit->bombardStrength();
    }
    return $ret;
  }

}

class UnitException extends \Exception {};

class TroopCarrier extends CompositeUnit {

  function addUnit( Unit $unit) {
    if ( $unit instanceof Cavalry ) {
    throw new UnitException("Can't get a horse on the vehicle" );
    }
    super::addUnit( $unit);
  }

  function bombardStrength() {
    return 0;
  }
}


class Archer extends Unit {

  function bombardStrength() {
    return 4;
  }
}

class Cavalry extends Unit {

  function bombardStrength() {
    return 20;
  }
}

class LaserCannonUnit extends Unit {

  function bombardStrength() {
    return 44;
  }
}

class UnitScript {
  static function joinExisting( Unit $newUnit, Unit $occupyingUnit ) {
    $comp;

    if ( ! is_null( $comp = $occupyingUnit->getComposite() ) ) {
      $comp->addUnit( $newUnit );
    } else {
        $comp = new Army();
        $comp->addUnit( $occupyingUnit );
        $comp->addUnit( $newUnit );
    }
    return $comp;
    }
  }


 ?>
