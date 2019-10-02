<?php
namespace Classes\BehaviouralPatterns\Strategy;

class FixedCostStrategy extends AbstractCostStrategy {
  function cost( Lesson $lesson ) {
    return 30;
  }

  function chargeType() {
    return "fixed rate";
  }
}
 ?>
