<?php
namespace Classes\StructuralPatterns\Composite;

class TroopCarrier extends AbstractCompositeUnit {

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
 ?>
