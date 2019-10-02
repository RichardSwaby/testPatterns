<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\Composite\Army;
use Classes\StructuralPatterns\Composite\LaserCannonUnit;
use Classes\StructuralPatterns\Composite\Cavalry;
use Classes\StructuralPatterns\Composite\Archer;
use Classes\BehaviouralPatterns\Visitor\TaxCollectionVisitor;

header('Content-Type: text/plain');

// Here visitor pattern is added to the composite pattern.
// In order to do that,
// (1) add <accept function> to Unit and Composite Unit and
// (2) create abstract class ArmyVisitor, and concrete class TaxCollectionVisitor
// which extends ArmyVisitor

//Composite pattern
// A simple inheritance tree whose objects can be joined at runtime to form
// structures that are also trees, but are orders of magnitude more flexible
// and complex. Multiple objects that share a single interface to the world.

class Visitor implements ICommand {
  static function execute($context) {
      $main_army = new Army();
      $main_army->addUnit( new Archer() );
      $main_army->addUnit( new LaserCannonUnit() );
      $main_army->addUnit( new Cavalry() );
      $taxcollector = new TaxCollectionVisitor();
      $main_army->accept( $taxcollector );
      print $taxcollector->getReport()."\n";
      print "TOTAL: ";
      print $taxcollector->getTax()."\n";
  }
}

 ?>
