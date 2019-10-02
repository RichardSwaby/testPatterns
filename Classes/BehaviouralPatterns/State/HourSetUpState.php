<?php
namespace Classes\BehaviouralPatterns\State;
use Interfaces\BehaviouralPatterns\State\ClockSetupState;

class HourSetupState implements ClockSetupState {

  private $hour;

  public function __construct() {
    $this->hour = date('G');  // default to current month
  }

  public function previousValue() {
    $this->hour--;
  }

  public function nextValue() {
    $this->hour++;
  }

  public function getInstructions () {
    echo 'Set the hour';
  }

  public function getSelectedValue() {
    return $this->hour;
  }
}


 ?>
