<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class FinishedSetupState implements ClockSetupState {

  public function __construct() {
  }

  public function previousValue() {
    // do nothing
  }

  public function nextValue() {
    // do nothing
  }

  public function getInstructions () {
    echo 'Press knob to view selected date...';
  }

  public function getSelectedValue() {
    // do nothing
  }
}

 ?>
