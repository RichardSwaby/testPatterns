<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IEngine;

abstract class AbstractEngine implements IEngine {
  private $size;
  private $turbo;

  public function __construct ( $size, $turbo) {
    $this->size = $size;
    $this->turbo = $turbo;
  }

  public function getSize() {
    return $this->size;
  }

  public function isTurbo() {
    return $this->turbo;
  }

  public function __toString() {
    return get_class($this) . '(' . (string)$this->size . ')';
  }
}
 ?>
