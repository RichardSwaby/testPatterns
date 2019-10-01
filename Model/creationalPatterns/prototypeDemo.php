<?php
namespace Model\creationalPatterns;
header('Content-Type: text/plain');
include 'C:\xampp\htdocs\testPatterns\Model\creationalPatterns\AbstractEngineDemo.php';

// Specify the kinds of objects to create using a prototypical instance,
// and create new objects by copying the prototype.

class prototypeDemo {
  static function execute() {
    $vehicleManager = new VehicleManagerLazy();
    $saloon1 = $vehicleManager->createSaloon();
    $saloon2 = $vehicleManager->createSaloon();
    $coupe = $vehicleManager->createCoupe();
    $pickup1 = $vehicleManager->createPickup();
    print_r ($vehicleManager);
    print_r ($saloon1);
    print_r ($saloon2);
    print_r ($coupe);
    print_r ($pickup1);
  }
}

class VehicleManagerLazy {
  private $saloon;
  private $coupe;
  private $sport;
  private $boxVan;
  private $pickup;

  public function __construct() {}

  public function createSaloon() {
    if ( empty($his->saloon) ) {
      $this->saloon = new car( new StandardEngine(1300) );
    }
    return clone $this->saloon;
  }

  public function createCoupe() {
    if ( empty($his->coupe) ) {
      $this->coupe = new car( new StandardEngine(1600) );
    }
    return clone $this->coupe;
  }

  public function createSport() {
    if ( empty($his->sport) ) {
      $this->sport = new car( new TurboEngine(2000) );
    }
    return clone $this->sport;
  }

  public function createBoxVan() {
    if ( empty($his->boxVan) ) {
      $this->boxVan = new van( new StandardEngine(2000) );
    }
    return clone $this->boxVan;
  }


  public function createPickup() {
    if ( empty($his->pickup) ) {
      $this->pickup = new van( new TurboEngine(2200) );
    }
    return clone $this->pickup;
  }

}
