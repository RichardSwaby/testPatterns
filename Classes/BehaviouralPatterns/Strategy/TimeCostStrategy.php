<?php
namespace Classes\BehaviouralPatterns\Strategy;

class TimeCostStrategy extends AbstractCostStrategy {
  function cost( Lesson $lesson) {
    return ( $lesson->getDuration() * 5);
  }
  function chargeType() {
    return "hourly rate";
  }
}
 ?>
