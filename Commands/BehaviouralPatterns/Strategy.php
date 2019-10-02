<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\Strategy\TimeCostStrategy;
use Classes\BehaviouralPatterns\Strategy\FixedCostStrategy;
use Classes\BehaviouralPatterns\Strategy\Seminar;
use Classes\BehaviouralPatterns\Strategy\Lecture;

header('Content-Type: text/plain');

// Strategy pattern uses Composition and delegation to move a set of algorithms to a separate type

// Define a family of algorithms, encapsulate each one, and make them interchangeable.
// Strategy lets the algorithm vary independently from clients that use it


class Strategy  implements ICommand {
  static function execute($context) {
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

 ?>
