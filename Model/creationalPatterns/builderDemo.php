<?php
namespace Model\creationalPatterns;
header('Content-Type: text/plain');
include 'C:\xampp\htdocs\testPatterns\Model\creationalPatterns\AbstractEngineDemo.php';


// A factory is simply a wrapper function around a constructor (possibly one in a different class).
// The key difference is that a factory method pattern requires the entire object to be built in a single method call,
// with all the parameters passed in on a single line. The final object will be returned.

// A builder pattern, on the other hand, is in essence a wrapper object around
// all the possible parameters you might want to pass into a constructor invocation.
// This allows you to use setter methods to slowly build up your parameter list.
// One additional method on a builder class is a build() method,
// which simply passes the builder object into the desired constructor,
// and returns the result.

// Constructing a complex object step by step : builder pattern
// A simple object is created by using a single method : factory method pattern
// Creating Object by using multiple factory method : Abstract factory pattern

class builderDemo {
  static function execute() {
    $car = new car( new StandardEngine(1300) );
    $builder = new Carbuilder($car);
    $car = CarDirector::build($builder);
    $car->paint(Vehicle::BLUE);
    echo "\n";
    print_r ($car);
    echo "\n";
  }
}

abstract class VehicleBuilder {

   public function buildBody() {}
   public function buildBoot() {}
   public function buildChassis () {}
   public function buildPassengerArea () {}
   public function buildReinforcedStorageArea () {}
   public function buildWindows () {}

   public abstract function getVehicle();

}

class CarBuilder extends VehicleBuilder {
   private $carInProgress;

   public function __construct (AbstractCar $abstractCar) {
     $this->carInProgress = $abstractCar;
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

   public function getVehicle() {
     return $this->carInProgress;
   }

}

class VanBuilder extends VehicleBuilder {
   private $vanInProgress;

   public function __construct (AbstractVan $abstractVan) {
     $this->vanInProgress = $abstractVan;
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

abstract class VehicleDirector {
   public abstract function build(VehicleBuilder $vehicleBuilder);
}

class CarDirector extends VehicleDirector {
  public function build(VehicleBuilder $vehicleBuilder) {
     $vehicleBuilder->buildChassis();
     $vehicleBuilder->buildBody();
     $vehicleBuilder->buildPassengerArea();
     $vehicleBuilder->buildBoot();
     $vehicleBuilder->buildWindows();

     return $vehicleBuilder->getVehicle();
   }
 }


 class VanDirector extends VehicleDirector {
   public function build(VehicleBuilder $vehicleBuilder) {
      $vehicleBuilder->buildChassis();
      $vehicleBuilder->buildBody();
      $vehicleBuilder->buildReinforcedStorageArea();
      $vehicleBuilder->buildWindows();

      return $vehicleBuilder->getVehicle();
    }
  }
