<?php
header('Content-Type: text/plain');
namespace Model\creationalPatterns;
// Provide an interface for creating families of related or dependent objects
// without specifying their concrete classes.

class FactorydemoVehicle {

  static function execute() {
    $factory = new CarFactory();
    $vehicleBody = $factory->createBody();
    $vehicleChassis = $factory->createChassis();
    $vehicleWindows = $factory->createWindows();

    echo $vehicleBody->getBodyParts();
    echo $vehicleChassis->getChassisParts();
    echo $vehicleWindows->getWindowParts();

    $factory = new VanFactory();
    $vehicleBody = $factory->createBody();
    $vehicleChassis = $factory->createChassis();
    $vehicleWindows = $factory->createWindows();

    echo $vehicleBody->getBodyParts();
    echo $vehicleChassis->getChassisParts();
    echo $vehicleWindows->getWindowParts();
}

abstractVehicleFactory {
  public abstract function createBody();
  public abstract function createChassis
  public abstract function create
}
