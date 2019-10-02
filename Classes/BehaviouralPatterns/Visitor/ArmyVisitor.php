<?php
namespace Classes\BehaviouralPatterns\Visitor;
use Classes\StructuralPatterns\Visitor\Archer;
use Classes\StructuralPatterns\Visitor\Cavalry;
use Classes\StructuralPatterns\Visitor\TroopCarrierUnit;
use Classes\StructuralPatterns\Visitor\AbstractUnit;


abstract class ArmyVisitor {
  abstract function visit ( AbstractUnit $node );
  function visitArcher ( Archer $node ) {
    $this->visit( $node );
  }
  function visitCavalry ( Cavalry $node ) {
    $this->visit( $node );
  }
  function visitLaserCannonUnit ( LaserCannonUnit $node ) {
    $this->visit( $node );
  }
  function visitTroopCarrierUnit ( TroopCarrierUnit $node ) {
    $this->visit( $node );
  }
  function visitArmy ( Army $node ) {
    $this->visit( $node );
  }
}

 ?>
