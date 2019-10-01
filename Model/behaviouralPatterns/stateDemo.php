<?php
namespace Model\behaviouralPatterns;
header('Content-Type: text/plain');

// Allow an object to alter its behaviou when its interaal state chages.
// The object will appear to change its class

class stateDemo {

  static function execute() {

    $clock = new clock();
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

  interface ClockSetupState {

  public function previousValue();
  public function nextValue();
  public function getInstructions();
  public function getSelectedValue();
  }


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
