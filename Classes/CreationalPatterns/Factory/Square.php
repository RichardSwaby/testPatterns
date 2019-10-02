<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IShape;

class Square implements IShape {
  function draw() {
    print_r("Drawing a square \n");
  }
}
 ?>
