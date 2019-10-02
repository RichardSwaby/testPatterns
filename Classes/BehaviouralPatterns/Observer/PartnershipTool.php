<?php
namespace Classes\BehaviouralPatterns\Observer;
use Interfaces\BehaviouralPatterns\Observer\Observable;
use Interfaces\BehaviouralPatterns\Observer\Observer;

class PartnershipTool implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    // check IP address
    // set cookie if it matches a list
    print __CLASS__.":\tset cookie if IP matches a list\n";
    }
  }
 ?>
