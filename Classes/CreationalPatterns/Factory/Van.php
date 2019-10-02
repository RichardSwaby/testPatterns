<?php
namespace Classes\CreationalPatterns\Factory;
use Interfaces\CreationalPatterns\Factory\IVehicle;

class Van extends AbstractVan{
  public function __construct ( AbstractEngine $engine,
                                 $colour = IVehicle::UNPAINTED) {
        parent::__construct ( $engine, $colour );
  }

    public function __clone() {} // this is for prototype pattern
}

 ?>
