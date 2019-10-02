<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\Iterator\CarRange;
use Classes\BehaviouralPatterns\Iterator\VanRange;

header('Content-Type: text/plain');

// Provide a way to access the elements of an aggregate object sequentially
// without exposing its underlying representation

class iterator implements ICommand {

  static function execute($context) {
    $carRange = new CarRange();
    foreach ($carRange as $car) {
      print_r($car);
      }

    $vanRange = new vanRange();
    foreach ($vanRange as $van) {
      print_r($van);
      }
  }
}
 ?>
