<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IShape;

class Circle implements IShape {
  function draw() {
    print_r("Drawing a circle \n");
  }
}
 ?>
