<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class MinuteSetupState implements ClockSetupState {

  private $minute;

  public function __construct() {
    $this->minute = date('i');  // default to current month
  }

  public function previousValue() {
    $this->minute--;
  }

  public function nextValue() {
    $this->minute++;
  }

  public function getInstructions () {
    echo 'Set the minute';
  }

  public function getSelectedValue() {
    return $this->minute;
  }
}

 ?>
