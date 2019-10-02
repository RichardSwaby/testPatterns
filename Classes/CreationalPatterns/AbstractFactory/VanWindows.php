<?php
namespace Classes\CreationalPatterns\AbstractFactory;
use Interfaces\CreationalPatterns\AbstractFactory\IWindows;

class VanWindows implements IWindows {
  public function getWindowParts() {
    return 'Window glassware for a van';
  }
}
 ?>
