<?php
namespace Classes\CreationalPatterns\Builder;
use Interfaces\CreationalPatterns\Builder\IVehicleDirector;
use Interfaces\CreationalPatterns\Builder\IVehicleBuilder;

class CarDirector implements IVehicleDirector {
  public function build(IVehicleBuilder $vehicleBuilder) {
     $vehicleBuilder->buildChassis();
     $vehicleBuilder->buildBody();
     $vehicleBuilder->buildPassengerArea();
     $vehicleBuilder->buildBoot();
     $vehicleBuilder->buildWindows();

     return $vehicleBuilder->getVehicle();
   }
 }
 ?>
