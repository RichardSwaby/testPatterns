<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\Composite\Army;
use Classes\StructuralPatterns\Composite\Archer;
use Classes\StructuralPatterns\Composite\LaserCannonUnit;
use Classes\StructuralPatterns\Composite\TroopCarrier;
use Classes\StructuralPatterns\Composite\UnitScript;

header('Content-Type: text/plain');

// A simple inheritance tree whose objects can be joined at runtime to form
// structures that are also trees, but are orders of magnitude more flexible
// and complex. Multiple objects that share a single interface to the world.

class Composite implements ICommand {

    static function execute($context) {
    // create an army
    $main_army = new Army();

    // add some units
    $troopCarrier = new TroopCarrier();
    $main_army->addUnit( $troopCarrier );
    $main_army->addUnit( new Archer() );
    $main_army->addUnit( new Archer() );
    $main_army->addUnit( new LaserCannonUnit() );
    // $troopCarrier->addUnit( new Cavalry() );
    echo "Main Army: ";
    print_r($main_army);
    echo "\n";

    //create a new army
    $sub_army = new Army();


    // add some units
    $sub_army->addUnit( new Archer() );
    $sub_army->addUnit( new Archer() );
    $sub_army->addUnit( new Archer() );
    echo "Sub Army: ";
    print_r($sub_army);
    echo "\n";

    UnitScript::joinExisting( $sub_army, $main_army );
    echo "Joint forces: ";
    print_r($main_army);
    echo "\n";

    // all the calculations handled behind the scenes
    print "attacking with strength: {$main_army->bombardStrength()}\n";
    }
}

 ?>
