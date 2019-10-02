<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Interfaces\CreationalPatterns\AbstractFactory\IChassis;

class VanChassis implements IChassis {
  public function getChassisParts() {
    return 'Chassis parts for a van';
  }
}
 ?>
