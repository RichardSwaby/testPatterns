<?php
namespace Interfaces\BehaviouralPatterns\ChainOfResponsibility;

interface EmailHandler {
  public function setNextHandler (EmailHandler $handler);
  public function processHandler ($email);
}
 ?>
