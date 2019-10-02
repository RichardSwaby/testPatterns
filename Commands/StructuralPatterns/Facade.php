<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\CreationalPatterns\Factory\Car;
use Classes\CreationalPatterns\Factory\StandardEngine;
use Classes\StructuralPatterns\Facade\VehicleFacade;
use Classes\StructuralPatterns\Facade\Vehicle;

header('Content-Type: text/plain');

class Facade {
  public static function execute() {
    VehicleFacade::prepareForSale(new Vehicle);
  }
}
 ?>
