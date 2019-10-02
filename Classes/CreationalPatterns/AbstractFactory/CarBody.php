<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Interfaces\CreationalPatterns\AbstractFactory\IBody;

class CarBody implements IBody {
  public function getBodyParts() {
    return 'Body shell parts for a car';
  }
}
 ?>
