<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Classes\CreationalPatterns\AbstractFactory\AbstractVehicleFactory;
use Classes\CreationalPatterns\AbstractFactory\CarBody;
use Classes\CreationalPatterns\AbstractFactory\CarChassis;
use Classes\CreationalPatterns\AbstractFactory\CarWindows;

class CarFactory extends AbstractVehicleFactory {
  public function createBody() {
    return new CarBody();
  }

  public function createChassis() {
    return new CarChassis();
  }

  public function createWindows() {
    return new CarWindows();
  }
  
}
 ?>
