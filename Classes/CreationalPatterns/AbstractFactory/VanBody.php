<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Interfaces\CreationalPatterns\AbstractFactory\IBody;

class VanBody implements IBody {
  public function getBodyParts() {
    return 'Body shell parts for a van';
  }
}
 ?>
