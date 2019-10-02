<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class YearSetupState implements ClockSetupState {

  private $year;

  public function __construct() {
    $this->year = date('Y');  // default to current month
  }

  public function previousValue() {
    $this->year--;
  }

  public function nextValue() {
    $this->year++;
  }

  public function getInstructions () {
    echo 'Set the year';
  }

  public function getSelectedValue() {
    return $this->year;
  }
}

 ?>
