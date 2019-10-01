<?php
namespace Model\structuralPatterns;
header('Content-Type: text/plain');

// Decorator classes hold an instance of another class of their own types
// See here how tileDecorator is used to decorate a Plains Tile with
// Diamonds or Pollution or both

class decoratorDemo {

  static function execute() {
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

abstract class Tile {
  abstract function getWealthFactor();
}

class Plains extends Tile {
  private $wealthfactor = 2;
  function getWealthFactor() {
    return $this->wealthfactor;
  }
}

abstract class TileDecorator extends Tile {
  protected $file;
  function __construct(Tile $tile) {
    $this->tile = $tile;
  }
}

class DiamondDecorator extends TileDecorator {
  function getWealthFactor() {
    return $this->tile->getWealthFactor()+2;
  }
}

class PollutionDecorator extends TileDecorator {
  function getWealthFactor() {
    return $this->tile->getWealthFactor()-4;
  }
}


 ?>
