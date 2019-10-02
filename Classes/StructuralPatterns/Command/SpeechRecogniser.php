<?php
namespace Classes\StructuralPatterns\Command;

class SpeechRecogniser {
  private $upCommand;
  private $downCommand;

  public function setCommands( AbstractCommand $upCommand, AbstractCommand $downCommand ) {
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
 ?>
