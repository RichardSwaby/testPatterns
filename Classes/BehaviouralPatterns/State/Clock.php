<?php
namespace Classes\BehaviouralPatterns\State;

class clock {
    private $yearState;
    private $monthState;
    private $dayState;
    private $hourState;
    private $minuteState;
    private $finishedState;
    private $currentState;
    public function __construct() {
      $this->yearState = new YearSetupState();
      $this->monthState = new MonthSetupState();
      $this->dayState = new DaySetupState();
      $this->hourState = new HourSetupState();
      $this->minuteState = new MinuteSetupState();
      $this->finishedState = new FinishedSetupState();
      $this->setState($this->yearState);
    }
    
    public function setState($state) {
        $this->currentState = $state;
        echo $this->currentState->getInstructions(); echo "\t";
    }

    public function rotateKnobLeft() {
      $this->currentState->previousValue();
    }

    public function rotateKnobRight() {
      $this->currentState->nextValue();
    }

    public function pushKnob() {
        echo $this->currentState->getSelectedValue(); echo "\n";
        switch ($this->currentState) {
          case $this->yearState:
            $this->setState($this->monthState);
            break;
          case $this->monthState:
            $this->setState($this->dayState);
            break;
          case $this->dayState:
            $this->setState($this->hourState);
            break;
          case $this->hourState:
            $this->setState($this->minuteState);
            break;
          case $this->minuteState:
            $this->setState($this->finishedState);
            break;
        }
    }

    public function getSelectedDate() {
      $date = mktime ($this->hourState->getSelectedValue(),
                      $this->minuteState->getSelectedValue(),
                      0,
                      $this->monthState->getSelectedValue(),
                      $this->dayState->getSelectedValue(),
                      $this->yearState->getSelectedValue(),
                    );
      return date('r', $date);
  }
}
 ?>
