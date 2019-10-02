<?php
namespace Classes\StructuralPatterns\Command;

class Radio {
  const MIN_VOLUME = 0;
  const MAX_VOLUME = 10;
  const DEFAULT_VOLUME = 5;

  private $on;
  private $volume;

  public function __construct() {
    $this->on = false;
    $this->volume = Radio::DEFAULT_VOLUME;
  }

  public function isOn() {
    return $this->on;
  }

  public function getVolume() {
      return $this->volume;
  }

  public function on() {
    $this->on = true;
  }

  public function off() {
    $this->on = false;
  }

  public function volumeUp() {
    if ($this->isOn()) {
      if ( $this->getVolume() < Radio::MAX_VOLUME ) {
        $this->volume++;
      }
    }
  }

  public function volumeDown() {
    if ($this->isOn()) {
      if ( $this->getVolume() > Radio::MIN_VOLUME ) {
        $this->volume--;
      }
    }
  }

}

 ?>
