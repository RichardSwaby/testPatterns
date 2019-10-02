<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IShape;

class Rectangle implements IShape {
  function draw() {
    print_r("Drawing a rectangle \n");
  }
}
 ?>
