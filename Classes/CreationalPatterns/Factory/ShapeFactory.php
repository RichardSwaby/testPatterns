<?php
namespace Classes\CreationalPatterns\Factory;

class ShapeFactory {

// This is the factory method

  static function getShape(string $shapeType) {

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
 ?>
