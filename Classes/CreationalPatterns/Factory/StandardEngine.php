<?php
namespace Classes\CreationalPatterns\Factory;

class StandardEngine extends AbstractEngine {
  public function __construct($size) {
    parent::__construct( $size, false );  // not turbocharged
  }
}
 ?>
