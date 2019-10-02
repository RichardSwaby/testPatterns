<?php
namespace Commands\CreationalPatterns;
use Controller\ICommand;
use Controller\CommandContext;
use Classes\CreationalPatterns\AbstractFactory\CarFactory;
use Classes\CreationalPatterns\AbstractFactory\VanFactory;

// Provide an interface for creating families of related or dependent objects
// without specifying their concrete classes.

// NB. This only gets the vehicle parts. It doesn't assemble a vehicle

class AbstractFactory implements ICommand {
  static public function execute($vehicleType) {
     print_r($vehicleType); echo "\n";
     if ($vehicleType == 'Car') {
       $factory = new CarFactory();
     } else {
       $factory = new VanFactory();
     }

     print_r($factory);

     $vehicleBody = $factory->createBody();
     $vehicleChassis = $factory->createChassis();
     $vehicleWindows = $factory->createWindows();

     echo $vehicleBody->getBodyParts(); echo "\n";
     echo $vehicleChassis->getChassisParts(); echo "\n";
     echo $vehicleWindows->getWindowParts(); echo "\n";

  }
}

 ?>
