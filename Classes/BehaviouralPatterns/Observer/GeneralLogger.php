<?php
namespace Classes\BehaviouralPatterns\Observer;
use Interfaces\BehaviouralPatterns\Observer\Observable;
use Interfaces\BehaviouralPatterns\Observer\Observer;

class GeneralLogger implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    // add login data to log
    print __CLASS__.":\t\tadd login data to log\n";
    }
  }
   ?>
