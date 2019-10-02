<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class DaySetupState implements ClockSetupState {

  private $day;

  public function __construct() {
    $this->day = date('j');  // default to current month
  }

  public function previousValue() {
    $this->day--;
  }

  public function nextValue() {
    $this->day++;
  }

  public function getInstructions () {
    echo 'Set the day';
  }

  public function getSelectedValue() {
    return $this->day;
  }
}


 ?>
