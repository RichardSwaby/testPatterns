<?php
namespace Classes\behaviouralPatterns\Iterator;
use Classes\CreationalPatterns\Factory\Van;
use Classes\CreationalPatterns\Factory\StandardEngine;
use Classes\CreationalPatterns\Factory\TurboEngine;

class VanRange implements \IteratorAggregate {
// Here use is made of the IteratorAggregate interface which requires only one
// function: ArrayIterator, that converts an array into an iterator

  private $vans = array();

  public function __construct() {
    $this->vans[0] = new Van ( new StandardEngine(1600) );
    $this->vans[1] = new Van ( new StandardEngine(2000) );
    $this->vans[2] = new Van ( new TurboEngine(2200) );
  }

  public function getIterator() {
    return new \ArrayIterator ( $this->vans);
  }
}

 ?>
