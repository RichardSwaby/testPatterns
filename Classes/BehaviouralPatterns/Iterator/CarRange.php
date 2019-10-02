<?php
namespace Classes\behaviouralPatterns\Iterator;
use Classes\CreationalPatterns\Factory\Car;
use Classes\CreationalPatterns\Factory\StandardEngine;
use Classes\CreationalPatterns\Factory\TurboEngine;

class CarRange implements \Iterator {
  private $cars = array();
  private $index = 0;

  public function __construct() {
    $this->cars[] = new Car( new StandardEngine(1300) );
    $this->cars[] = new Car( new StandardEngine(1600) );
    $this->cars[] = new Car( new StandardEngine(2000) );
    $this->cars[] = new Car( new TurboEngine(2500) );
  }

  // Move the iterator back to the beginning
  public function rewind() {
    $this->index = 0;
  }

  // Return true if there is a current Element
  public function valid() {
    return isset ( $this->cars[$this->index] );
  }

  // Return the current element
  public function current() {
    return $this->cars[$this->index];
  }

  // Return the current index
  public function key() {
    return $this->index;
  }

  // Point to the next element
  public function next() {
    $this->index++;
  }
}

 ?>
