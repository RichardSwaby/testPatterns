<?php
namespace Classes\BehaviouralPatterns\Strategy;

abstract class AbstractCostStrategy {
  abstract function cost( Lesson $lesson);
  abstract function chargeType();
}
 ?>
