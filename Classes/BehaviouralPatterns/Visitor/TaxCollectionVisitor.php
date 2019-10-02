<?php
namespace Classes\BehaviouralPatterns\Visitor;
use Classes\StructuralPatterns\Visitor\Archer;
use Classes\StructuralPatterns\Visitor\Cavalry;
use Classes\StructuralPatterns\Visitor\TroopCarrierUnit;
use Classes\StructuralPatterns\Visitor\AbstractUnit;

class TaxCollectionVisitor extends ArmyVisitor {
  private $due=0;
  private $report="";
  function visit ( AbstractUnit $node ) {
    $this->levy( $node, 1 );
  }
  function visitArcher ( Archer $node ) {
    $this->levy( $node, 2 );
  }
  function visitCavalry ( Cavalry $node ) {
    $this->levy( $node, 3 );
  }
  function visitTroopCarrierUnit ( TroopCarrierUnit $node ) {
    $this->levy( $node, 5 );
  }
  private function levy ( AbstractUnit $unit, $amount ) {
    $this->report .= "Tax levied for ".get_Class( $unit);
    $this->report .= ": $amount\n";
    $this->due += $amount;
  }
  function getReport() {
    return $this->report;
  }
  function getTax() {
    return $this->due;
  }
}

 ?>
