<?php
namespace Commands\CreationalPatterns;
use Controller\ICommand;
use Classes\CreationalPatterns\Factory\Car;
use Classes\CreationalPatterns\Factory\StandardEngine;
use Classes\CreationalPatterns\Builder\CarBuilder;
use Classes\CreationalPatterns\Builder\CarDirector;
use Interfaces\CreationalPatterns\Factory\IVehicle;

header('Content-Type: text/plain');
// A factory is simply a wrapper function around a constructor (possibly one in a different class).
// The key difference is that a factory method pattern requires the entire object to be built in a single method call,
// with all the parameters passed in on a single line. The final object will be returned.

// A builder pattern, on the other hand, is in essence a wrapper object around
// all the possible parameters you might want to pass into a constructor invocation.
// This allows you to use setter methods to slowly build up your parameter list.
// One additional method on a builder class is a build() method,
// which simply passes the builder object into the desired constructor,
// and returns the result.

// Constructing a complex object step by step : builder pattern
// A simple object is created by using a single method : factory method pattern
// Creating Object by using multiple factory method : Abstract factory pattern

// For simplicity this is violating the Liskov substitution SOLID principle
// It should really create a new abstract vehicle then a new abstract VehicleBuilder
// then a new abstract VehicleDirector
// That way we could accept the type of vehicle as a parameter in the $context
// object and this class will produce that vehicle`

class builder implements ICommand {
  static function execute($context) {
    $car = new Car( new StandardEngine(1300) );
    $builder = new CarBuilder($car);
    $car = CarDirector::build($builder);
    $car->paint(IVehicle::BLUE);
    echo "\n";
    print_r ($car);
    echo "\n";
  }
}

 ?>
