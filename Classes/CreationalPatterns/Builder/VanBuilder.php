<?php
namespace Classes\CreationalPatterns\Builder;
use Classes\CreationalPatterns\Factory\Van;
use Interfaces\CreationalPatterns\Builder\IVehicleBuilder;

class VanBuilder implements IVehicleBuilder {
   private $vanInProgress;

   public function __construct (Van $Van) {
     $this->vanInProgress = $Van;
   }

   public function buildBody() {
     echo "Adding body to $this->vanInProgress\n";
   }

   public function buildChassis () {
     echo "Adding chassis to $this->vanInProgress\n";
   }

   public function buildReinforcedStorageArea () {
     echo "Adding reinforced storage area to $this->vanInProgress\n";
   }

   public function buildWindows () {
     echo "Adding windows to $this->vanInProgress\n";
   }

   public function getVehicle() {
     return $this->vanInProgress;
  }

}
 ?>
