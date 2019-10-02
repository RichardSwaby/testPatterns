<?php
namespace Interfaces\CreationalPatterns\Builder;

Interface IVehicleBuilder {

   public function buildBody();
   public function buildBoot();
   public function buildChassis ();
   public function buildPassengerArea ();
   public function buildReinforcedStorageArea ();
   public function buildWindows ();

   public function getVehicle();

}
 ?>
