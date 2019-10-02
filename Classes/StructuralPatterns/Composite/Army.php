<?php
namespace Classes\StructuralPatterns\Composite;

class Army extends AbstractCompositeUnit{

  function bombardStrength() {
    $ret = 0;
    foreach( $this->units() as $unit ) {
      $ret += $unit->bombardStrength();
    }
    return $ret;
  }

}
 ?>
