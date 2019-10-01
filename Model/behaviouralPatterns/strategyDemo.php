<?php
namespace Model\behaviouralPatterns;
header('Content-Type: text/plain');

// Strategy pattern uses Composition and delegation to move a set of algorithms to a separate type

// Define a family of algorithms, encapsulate each one, and make them interchangeable.
// Strategy lets the algorithm vary independently from clients that use it


class strategyDemo {
  static function execute() {
      $lessons[] = new Seminar( 4, new TimeCostStrategy() );
      $lessons[] = new Lecture( 4, new FixedCostStrategy() );

      // In the foreach Loop the Lesson obj is invoking the cost() and chargeType()
      // functions of the costStrategy objects.
      // This is called delegation
      // The costStrategy objects are the delegate of Lesson.

      foreach ( $lessons as $lesson ) {
        print "lesson charge {$lesson->cost()}. ";
        print "charge type: {$lesson->chargeType()}\n";
      }
  }
}

abstract class Lesson {
  private $duration;
  private $costStrategy;

  function __construct( $duration, CostStrategy $strategy ) {
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

class Lecture extends Lesson {}
class Seminar extends Lesson {}

abstract class CostStrategy {
  abstract function cost( Lesson $lesson);
  abstract function chargeType();
}

class TimeCostStrategy extends CostStrategy {
  function cost( Lesson $lesson) {
    return ( $lesson->getDuration() * 5);
  }
  function chargeType() {
    return "hourly rate";
  }
}

class FixedCostStrategy extends costStrategy {
  function cost( Lesson $lesson ) {
    return 30;
  }

  function chargeType() {
    return "fixed rate";
  }
}


 ?>
