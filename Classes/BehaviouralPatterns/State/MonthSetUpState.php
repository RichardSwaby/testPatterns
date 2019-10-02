<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class MonthSetupState implements ClockSetupState {

  private $month;

  public function __construct() {
    $this->month = date('n');  // default to current month
  }

  public function previousValue() {
    $this->month--;
  }

  public function nextValue() {
    $this->month++;
  }

  public function getInstructions () {
    echo 'Set the month';
  }

  public function getSelectedValue() {
    return $this->month;
  }
}

 ?>
