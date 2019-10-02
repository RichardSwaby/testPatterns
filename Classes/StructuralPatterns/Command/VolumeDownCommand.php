<?php
namespace Classes\StructuralPatterns\Command;
use Classes\StructuralPatterns\Command\AbstractCommand;

class VolumeDownCommand extends AbstractCommand {
  private $radio;

  public function __construct( Radio $radio ) {
    $this->radio = $radio;
  }

  public function execute() {
    $this->radio->volumeDown();
  }
}
 ?>
