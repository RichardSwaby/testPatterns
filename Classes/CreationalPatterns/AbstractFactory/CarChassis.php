<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Interfaces\CreationalPatterns\AbstractFactory\IChassis;

class CarChassis implements IChassis {
  public function getChassisParts() {
    return 'Chassis parts for a car';
  }
}
 ?>
