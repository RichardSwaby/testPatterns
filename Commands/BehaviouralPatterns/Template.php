<?php
namespace Commands\behaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\Template\SaloonBooklet;
use Classes\BehaviouralPatterns\Template\ServiceHistoryBooklet;

header('Content-Type: text/plain');

// Define the skeleton of an algorithm in a function, deferring some steps to subclasses.
// Template Method lets subclasses redefine certain steps of an algorithm
// without changing the algorithm;s structure.

class Template implements ICommand {
    static function execute($context) {
      $saloonBooklet = new SaloonBooklet();
      $saloonBooklet->printBooklet();

      echo "\n";

      $serviceBooklet = new ServiceHistoryBooklet();
      $serviceBooklet->printBooklet();
    }
}

 ?>
