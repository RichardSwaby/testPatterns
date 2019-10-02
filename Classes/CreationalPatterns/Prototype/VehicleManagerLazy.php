<?php
namespace Classes\CreationalPatterns\Prototype;
use Classes\CreationalPatterns\Factory\Car;
use Classes\CreationalPatterns\Factory\Van;
use Classes\CreationalPatterns\Factory\StandardEngine;
use Classes\CreationalPatterns\Factory\TurboEngine;

class VehicleManagerLazy {
  private $saloon;
  private $coupe;
  private $sport;
  private $boxVan;
  private $pickup;

  public function __construct() {}

  public function createSaloon() {
    if ( empty($his->saloon) ) {
      $this->saloon = new Car( new StandardEngine(1300) );
    }
    return clone $this->saloon;
  }

  public function createCoupe() {
    if ( empty($his->coupe) ) {
      $this->coupe = new Car( new StandardEngine(1600) );
    }
    return clone $this->coupe;
  }

  public function createSport() {
    if ( empty($his->sport) ) {
      $this->sport = new Car( new TurboEngine(2000) );
    }
    return clone $this->sport;
  }

  public function createBoxVan() {
    if ( empty($his->boxVan) ) {
      $this->boxVan = new Van( new StandardEngine(2000) );
    }
    return clone $this->boxVan;
  }


  public function createPickup() {
    if ( empty($his->pickup) ) {
      $this->pickup = new Van( new TurboEngine(2200) );
    }
    return clone $this->pickup;
  }

}
 ?>
