<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\Command\VolumeUpCommand;
use Classes\StructuralPatterns\Command\VolumeDownCommand;
use Classes\StructuralPatterns\Command\WindowUpCommand;
use Classes\StructuralPatterns\Command\WindowDownCommand;
use Classes\StructuralPatterns\Command\SpeechRecogniser;
use Classes\StructuralPatterns\Command\ElectricWindow;
use Classes\StructuralPatterns\Command\Radio;



header('Content-Type: text/plain');

// Encapsulate a request as an object, thereby letting, you parameterise clients
// with different requests, queue, or log requests, and support undoable operations.

class Command implements ICommand {

    static function execute($context) {
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

 ?>
