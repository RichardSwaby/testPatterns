<?php
namespace Classes\StructuralPatterns\Composite;

class UnitScript {
  static function joinExisting( AbstractUnit $newUnit, AbstractUnit $occupyingUnit ) {
    $comp;

    if ( ! is_null( $comp = $occupyingUnit->getComposite() ) ) {
      $comp->addUnit( $newUnit );
    } else {
        $comp = new Army();
        $comp->addUnit( $occupyingUnit );
        $comp->addUnit( $newUnit );
    }
    return $comp;
    }
  }
 ?>
