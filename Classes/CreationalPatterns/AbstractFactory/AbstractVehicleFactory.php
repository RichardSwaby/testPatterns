<?php
namespace Classes\CreationalPatterns\AbstractFactory;

abstract class AbstractVehicleFactory {

  public abstract function createBody();
  public abstract function createChassis();
  public abstract function createWindows();
}
 ?>
