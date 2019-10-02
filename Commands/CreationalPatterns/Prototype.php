<?php
namespace Commands\CreationalPatterns;
use Controller\ICommand;
use Classes\CreationalPatterns\Prototype\VehicleManagerLazy;

header('Content-Type: text/plain');

// Specify the kinds of objects to create using a prototypical instance,
// and create new objects by copying the prototype.

class prototype implements ICommand {
  static function execute($context) {
    $vehicleManager = new VehicleManagerLazy();
    $saloon1 = $vehicleManager->createSaloon();
    $saloon2 = $vehicleManager->createSaloon();
    $coupe = $vehicleManager->createCoupe();
    $pickup1 = $vehicleManager->createPickup();
    print_r ($vehicleManager);
    print_r ($saloon1);
    print_r ($saloon2);
    print_r ($coupe);
    print_r ($pickup1);
  }
}

 ?>
