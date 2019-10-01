<?php
namespace Model\creationalPatterns;
header('Content-Type: text/plain');

// The factory is a concrete object the products produced by the factory are
// concrete products of an interface class
// The factory uses a switch to instantiate an object of type passed to its
// method by the client
// The client doesn't use conditional statements or the new statement to do this

class shapeFactorymethoddemo {
  static function execute() {

      $shapeFactory = new ShapeFactory;

      $shape1 = $shapeFactory->getShape("CIRCLE");
      $shape1->draw();

      $shape2 = $shapeFactory->getShape("RECTANGLE");
      $shape2->draw();

      $shape3 = $shapeFactory->getShape("SQUARE");
      $shape3->draw();
  }

}

class ShapeFactory {

  function __construct() {}

// This is the factory method

  function getShape(string $shapeType) {

    switch (strtoupper($shapeType)) {
      case 'CIRCLE':
        return new Circle();
      break;

      case 'RECTANGLE':
        return new Rectangle();
      break;

      case 'SQUARE':
        return new Square();
      break;

      default:
        // code...
      break;
    }
  }
}

interface Shape {
  function draw();
}

class Rectangle implements Shape {
  function draw() {
    print_r("Drawing a rectangle \n");
  }
}

class Square implements Shape {
  function draw() {
    print_r("Drawing a square \n");
  }
}

class Circle implements Shape {
  function draw() {
    print_r("Drawing a circle \n");
  }
}


 ?>
