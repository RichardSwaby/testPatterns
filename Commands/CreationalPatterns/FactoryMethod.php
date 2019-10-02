<?php
namespace Commands\CreationalPatterns;
use Controller\ICommand;
use Classes\CreationalPatterns\Factory\ShapeFactory;

header('Content-Type: text/plain');

// The factory is a concrete object the products produced by the factory are
// concrete products of an interface class
// The factory uses a switch to instantiate an object of type passed to its
// method by the client
// The client doesn't use conditional statements or the new statement to do this

class Factorymethod implements ICommand {
  static function execute($context) {

      $shape1 = ShapeFactory::getShape("CIRCLE");
      $shape1->draw();

      $shape2 = ShapeFactory::getShape("RECTANGLE");
      $shape2->draw();

      $shape3 = ShapeFactory::getShape("SQUARE");
      $shape3->draw();
  }

}

 ?>
