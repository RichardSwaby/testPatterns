<?php
namespace Classes\StructuralPatterns\Command;

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

 ?>
