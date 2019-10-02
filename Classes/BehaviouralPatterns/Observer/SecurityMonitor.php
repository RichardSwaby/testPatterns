<?php
namespace Classes\BehaviouralPatterns\Observer;
use Interfaces\BehaviouralPatterns\Observer\Observable;
use Interfaces\BehaviouralPatterns\Observer\Observer;

class SecurityMonitor implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    if ( $status[0] == Login::LOGIN_WRONG_PASS ) {
      // send mail to sysadmin
      print __CLASS__.":\tsending mail to sysadmin\n";
    }
  }
}
 ?>
