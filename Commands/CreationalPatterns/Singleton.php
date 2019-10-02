<?php
namespace Commands\CreationalPatterns;
use Controller\ICommand;
use Classes\CreationalPatterns\Singleton\Preferences;

header('Content-Type: text/plain');

// Singleton pattern gets around the problem of Global variables

class Singleton  implements ICommand {
  static function execute($context) {

      $pref = Preferences::getInstance();
      $pref->setProperty("name", "Richard");
      unset ($pref);

      $pref2 = Preferences::getInstance();
      print $pref2->getProperty("name") . "\n"; // demonstrate that value is not lost
  }
}
 ?>
