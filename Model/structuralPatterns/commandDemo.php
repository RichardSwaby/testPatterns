<?php
namespace Model\structuralPatterns;
header('Content-Type: text/plain');

// Encapsulate a request as an object, thereby letting, you parameterise clients
// with different requests, queue, or log requests, and support undoable operations.

class commandDemo {

    static function execute() {
      // Create a radio and its up/down commond objects
      $radio = new Radio();
      print_r ($radio);
      $radio->on();
      print_r ($radio);
      $volumeUpCommand = new VolumeUpCommand( $radio );
      $volumeDownCommand = new VolumeDownCommand( $radio );

      // Create an electric window and its up/down command objects
      $window = new ElectricWindow();
      print_r ($window);
      $windowUpCommand = new WindowUpCommand ( $window );
      $windowDownCommand = new WindowDownCommand ( $window );

      // Create a SpeechRecogniser object
      $speechRecogniser = new SpeechRecogniser();

      // Create a single SpeechRecogniser object and set it to control the radio
      $speechRecogniser->setCommands ( $volumeUpCommand, $volumeDownCommand );
      $speechRecogniser->hearUpSpoken();
      print_r ($radio);
      $speechRecogniser->hearUpSpoken();
      print_r ($radio);
      $speechRecogniser->hearDownSpoken();
      print_r ($radio);

      // Now set the same SpeechRecogniser object to control the window instead
      $speechRecogniser->setCommands ( $windowUpCommand, $windowDownCommand );
      $speechRecogniser->hearDownSpoken();
      print_r ($window);
      $speechRecogniser->hearUpSpoken();
      print_r ($window);

    }
}


class SpeechRecogniser {
  private $upCommand;
  private $downCommand;

  public function setCommands( ICommand $upCommand, ICommand $downCommand ) {
    $this->upCommand = $upCommand;
    $this->downCommand = $downCommand;
  }

  public function hearUpSpoken() {
    $this->upCommand->execute();
  }

  public function hearDownSpoken() {
    $this->downCommand->execute();
  }
}



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

class ElectricWindow {
  private $open;

  public function __construct() {
    $this->open = false;
  }

  public function isOpen() {
    return $this->open;
  }

  public function isClosed() {
    return (! $this->open );
  }

  public function openWindow() {
    if ($this->isClosed() ) {
      $this->open = true;
    }
  }

  public function closeWindow() {
    if ($this->isOpen() ) {
      $this->open = false;
    }
  }
}


Interface ICommand {
  public function execute();
}

class VolumeUpCommand implements ICommand {
  private $radio;

  public function __construct( Radio $radio ) {
    $this->radio = $radio;
  }

  public function execute() {
    $this->radio->volumeUp();
  }
}

class VolumeDownCommand implements ICommand {
  private $radio;

  public function __construct( Radio $radio ) {
    $this->radio = $radio;
  }

  public function execute() {
    $this->radio->volumeDown();
  }
}

class WindowUpCommand implements ICommand {
  private $electricWindow;

  public function __construct( ElectricWindow $electricWindow) {
    $this->electricWindow = $electricWindow;
  }

  public function execute() {
    $this->electricWindow->closeWindow();
  }
}

class WindowDownCommand implements ICommand {
  private $electricWindow;

  public function __construct( ElectricWindow $electricWindow) {
    $this->electricWindow = $electricWindow;
  }

  public function execute() {
    $this->electricWindow->openWindow();
  }
}
