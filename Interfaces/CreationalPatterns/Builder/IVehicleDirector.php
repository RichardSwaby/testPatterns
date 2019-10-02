<?php
namespace Interfaces\CreationalPatterns\Builder;

Interface IVehicleDirector {
   public function build(IVehicleBuilder $vehicleBuilder);
}

 ?>
