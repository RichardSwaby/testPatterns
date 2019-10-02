<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Classes\CreationalPatterns\AbstractFactory\AbstractVehicleFactory;
use Classes\CreationalPatterns\AbstractFactory\VanBody;
use Classes\CreationalPatterns\AbstractFactory\VanChassis;
use Classes\CreationalPatterns\AbstractFactory\VanWindows;

class VanFactory extends AbstractVehicleFactory {
  public function createBody() {
    return new VanBody();
  }

  public function createChassis() {
    return new VanChassis();
  }

  public function createWindows() {
    return new VanWindows();
  }

}
 ?>
