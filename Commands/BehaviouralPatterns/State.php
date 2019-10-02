<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\State\Clock;
header('Content-Type: text/plain');

// Allow an object to alter its behaviou when its interaal state chages.
// The object will appear to change its class

class State  implements ICommand {

  static function execute($context) {

    $clock = new Clock();
    print_r($clock);

    // set up starts in year state
    $clock->rotateKnobRight();
    $clock->pushKnob();  // Year on

    // set up should now be in month state
    $clock->rotateKnobRight();
    $clock->rotateKnobRight();
    $clock->pushKnob();  // 2 months on


    // set up should now be in day state
    $clock->rotateKnobRight();
    $clock->rotateKnobRight();
    $clock->rotateKnobRight();
    $clock->pushKnob();  // 3 days on

    // set up should now be in hour state
    $clock->rotateKnobLeft();
    $clock->rotateKnobLeft();
    $clock->pushKnob();  // 2 hours back

    // set up should now be in minute state
    $clock->rotateKnobRight();
    $clock->pushKnob();  // 1 minute on

    // set up should now be in finished state
    $clock->pushKnob();

    print_r($clock);

    echo $clock->getSelectedDate();
  }
}

 ?>
