<?php
namespace Classes\BehaviouralPatterns\Visitor;

abstract class AbstractCompositeUnit {
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
 ?>
