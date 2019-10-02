<?php
namespace Classes\StructuralPatterns\Composite;

abstract class AbstractCompositeUnit extends AbstractUnit{
  private $units = array();

  function getComposite() {
    return $this;
  }

  protected function units() {
    return $this->units;
  }

  function addUnit( AbstractUnit $unit ) {
    if (in_array( $unit, $this->units, true) ) {
      return;
    }
    $this->units[] = $unit;
  }

  function removeUnit( AbstractUnit $unit) {
    $units = array();
    foreach( $this->units as $thisunit ) {
      if ( $unit !== $thisunit) {
        $units[] = $thisunit;
      }
    }
    $this->units = $units;
  }
}

 ?>
