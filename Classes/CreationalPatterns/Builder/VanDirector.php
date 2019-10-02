<?php
namespace Classes\CreationalPatterns\Builder;

class VanDirector extends AbstractVehicleDirector {
  public function build(VehicleBuilder $vehicleBuilder) {
     $vehicleBuilder->buildChassis();
     $vehicleBuilder->buildBody();
     $vehicleBuilder->buildReinforcedStorageArea();
     $vehicleBuilder->buildWindows();

     return $vehicleBuilder->getVehicle();
   }
 }
 ?>
