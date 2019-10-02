<?php

namespace Classes\BehaviouralPatterns\Visitor;

abstract class AbstractUnit {
  function getComposite() {
      return null;
  }

  function accept ( ArmyVisitor $visitor ) {
    $class = get_class( $this );
    echo $class . "\n";
    preg_match("~([a-zA-Z0-9]*)$~", $class, $matches); // remove the namespace
    $method = "visit".$matches[1];
    echo $method . "\n";
    $visitor->$method ( $this );
  }

  abstract function bombardStrength();
}
 ?>
