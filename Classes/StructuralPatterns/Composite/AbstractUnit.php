<?php
namespace Classes\StructuralPatterns\Composite;

abstract class AbstractUnit {
  function getComposite() {
      return null;
  }

  abstract function bombardStrength();
}
 ?>
