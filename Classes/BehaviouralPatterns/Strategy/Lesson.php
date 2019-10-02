<?php
namespace Classes\BehaviouralPatterns\Strategy;

abstract class Lesson {
  private $duration;
  private $costStrategy;

  function __construct( $duration, AbstractCostStrategy $strategy ) {
    $this->duration = $duration;
    $this->costStrategy = $strategy;
  }

  function cost() {
    return $this->costStrategy->cost( $this );
  }

  function chargeType() {
    return $this->costStrategy->chargeType();
  }

  function getDuration() {
    return $this->duration;
  }

  // more lesson methods
}
 ?>
