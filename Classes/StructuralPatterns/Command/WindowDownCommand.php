<?php
namespace Classes\StructuralPatterns\Command;
use Classes\StructuralPatterns\Command\AbstractCommand;

class WindowDownCommand extends AbstractCommand {
  private $electricWindow;

  public function __construct( ElectricWindow $electricWindow) {
    $this->electricWindow = $electricWindow;
  }

  public function execute() {
    $this->electricWindow->openWindow();
  }
}
 ?>
