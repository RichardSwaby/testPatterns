<?php

namespace Model\behaviouralPatterns;
use Model\creationalPatterns\car as car;
use Model\creationalPatterns\van as van;
use Model\creationalPatterns\StandardEngine as StandardEngine;
use Model\creationalPatterns\TurboEngine as TurboEngine;


include 'C:\xampp\htdocs\testPatterns\Model\creationalPatterns\AbstractEngineDemo.php';
header('Content-Type: text/plain');

// Provide a way to access the elements of an aggregate object sequentially
// without exposing its underlying representation

class iteratorDemo {

  static function execute($context) {
    $carRange = new CarRange();
    foreach ($carRange as $car) {
      print_r($car);
      }

    $vanRange = new vanRange();
    foreach ($vanRange as $van) {
      print_r($van);
      }
  }
}

class CarRange implements \Iterator {
  private $cars = array();
  private $index = 0;

  public function __construct() {
    $this->cars[] = new car( new StandardEngine(1300) );
    $this->cars[] = new car( new StandardEngine(1600) );
    $this->cars[] = new car( new StandardEngine(2000) );
    $this->cars[] = new car( new TurboEngine(2500) );
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

class vanRange implements \IteratorAggregate {
// Here use is made of the IteratorAggregate interface which requires only one
// function: ArrayIterator, that converts an array into an iterator

  private $vans = array();

  public function __construct() {
    $this->vans[0] = new van ( new StandardEngine(1600) );
    $this->vans[1] = new van ( new StandardEngine(2000) );
    $this->vans[2] = new van ( new TurboEngine(2200) );
  }

  public function getIterator() {
    return new \ArrayIterator ( $this->vans);
  }
}
