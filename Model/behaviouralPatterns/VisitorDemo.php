<?php
namespace Model\behaviouralPatterns;
use function Model\behaviouralPatterns\Army as Army;
header('Content-Type: text/plain');

// Here visitor pattern is added to the composite pattern.
// In order to do that, add accept function to Unit and Composite Unit and
// add abstract class ArmyVisitor and concrete class TazCollectionVisitor which
// extends ArmyVisitor


//Composite pattern
// A simple inheritance tree whose objects can be joined at runtime to form
// structures that are also trees, but are orders of magnitude more flexible
// and complex. Multiple objects that share a single interface to the world.

class visitorDemo {
  static function execute() {
      $main_army = new Army();
      $main_army->addUnit( new Archer() );
      $main_army->addUnit( new LaserCannonUnit() );
      $main_army->addUnit( new Cavalry() );
      $taxcollector = new TaxCollectionVisitor();
      $main_army->accept( $taxcollector );
      print $taxcollector->getReport()."\n";
      print "TOTAL: ";
      print $taxcollector->getTax()."\n";
  }
}

abstract class Unit {
  function getComposite() {
      return null;
  }

  function accept ( ArmyVisitor $visitor ) {
    $class = get_class( $this );
    preg_match("~([a-zA-Z0-9]*)$~", $class, $matches); // remove the namespace
    $method = "visit".$matches[1];
    echo $method . "\n";
    $visitor->$method ( $this );
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

  function accept ( ArmyVisitor $visitor ) {
    $class = get_class( $this );
    preg_match("~([a-zA-Z0-9]*)$~", $class, $matches);   // remove the namespace
    $method = "visit".$matches[1];
    echo $method . "\n";
    $visitor->$method( $this );
    foreach ( $this->units as $thisunit ) {
      $thisunit->accept( $visitor );
    }
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

abstract class ArmyVisitor {

  abstract function visit ( Unit $node );

  function visitArcher ( Archer $node ) {
    $this->visit( $node );
  }

  function visitCavalry ( Cavalry $node ) {
    $this->visit( $node );
  }

  function visitLaserCannonUnit ( LaserCannonUnit $node ) {
    $this->visit( $node );
  }

  function visitTroopCarrierUnit ( TroopCarrierUnit $node ) {
    $this->visit( $node );
  }

  function visitArmy ( Army $node ) {
    $this->visit( $node );
  }


}

class TaxCollectionVisitor extends ArmyVisitor {
  private $due=0;
  private $report="";

  function visit ( Unit $node ) {
    $this->levy( $node, 1 );
  }

  function visitArcher ( Archer $node ) {
    $this->levy( $node, 2 );
  }

  function visitCavalry ( Cavalry $node ) {
    $this->levy( $node, 3 );
  }

  function visitTroopCarrierUnit ( TroopCarrierUnit $node ) {
    $this->levy( $node, 5 );
  }

  private function levy ( Unit $unit, $amount ) {
    $this->report .= "Tax levied for ".get_Class( $unit);
    $this->report .= ": $amount\n";
    $this->due += $amount;
  }

  function getReport() {
    return $this->report;
  }

  function getTax() {
    return $this->due;
  }
}


 ?>
