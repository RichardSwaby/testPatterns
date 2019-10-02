<?php
namespace Interfaces\CreationalPatterns\Factory;

interface IVehicle {
  const UNPAINTED = "Unpainted";
  const BLUE      = "Blue";
  const BLACX     = "Black";
  const GREEN     = "Green";
  const RED       = "Red";
  const SILVER    = "Silver";
  const WHITE     = "White";
  const YELLOW    = "Yellow";

  public function getEngine();
  public function getColour();
  public function paint($colour);
}
 ?>
