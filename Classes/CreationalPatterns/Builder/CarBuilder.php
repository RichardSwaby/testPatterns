<?php
namespace Classes\CreationalPatterns\Builder;
Use Classes\CreationalPatterns\Factory\Car;
use Interfaces\CreationalPatterns\Builder\IVehicleBuilder;

class CarBuilder implements IVehicleBuilder {
   private $carInProgress;

   public function __construct (Car $Car) {
     $this->carInProgress = $Car;
   }

   public function buildBody() {
     echo "Adding body to $this->carInProgress\n";
   }

   public function buildBoot() {
     echo "Adding boot to $this->carInProgress\n";
   }

   public function buildChassis () {
     echo "Adding chassis to $this->carInProgress\n";
   }

   public function buildPassengerArea () {
     echo "Adding passenger area to $this->carInProgress\n";
   }

   public function buildWindows () {
     echo "Adding windows to $this->carInProgress\n";
   }

// This violates Interface Segregation of SOLID principles
   public function buildReinforcedStorageArea() {}

   public function getVehicle() {
     return $this->carInProgress;
   }

}
 ?>
