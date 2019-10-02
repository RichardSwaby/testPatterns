<?php
namespace Classes\CreationalPatterns\Factory;

class TurboEngine extends AbstractEngine {
  public function __construct($size) {
    parent::__construct( $size, true );  // not turbocharged
  }
}
 ?>
