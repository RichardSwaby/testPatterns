<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\Decorator\PollutionDecorator;
use Classes\StructuralPatterns\Decorator\DiamondDecorator;
use Classes\StructuralPatterns\Decorator\Plains;

header('Content-Type: text/plain');

// Decorator classes hold an instance of another class of their own types
// See here how tileDecorator is used to decorate a Plains Tile with
// Diamonds or Pollution or both

class Decorator implements ICommand {

  static function execute($context) {
      $tile = new Plains();
      print 'Plains: wealth = ' . $tile->getWealthFactor();
      echo "\n";

      $tile = new DiamondDecorator(
              new Plains()
      );
      print 'Plains decorated with Diamonds: wealth = ' . $tile->getWealthFactor();
      echo "\n";

      $tile = new PollutionDecorator(
              new DiamondDecorator(
              new Plains()
                )
        );
      print 'Plains decorated with Diamonds but polluted: wealth = ' . $tile->getWealthFactor();
      echo "\n";
  }
}

 ?>
