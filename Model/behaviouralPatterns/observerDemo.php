<?php
namespace Model\behaviouralPatterns;
header('Content-Type: text/plain');

// Define a one-to-many dependency between objects so that when one object changes
// its state, all its dependants are notified and updated automatically

class observerDemo {

  static function execute() {
      $login = new Login();

      $login->attach( new SecurityMonitor );
      $login->attach( new GeneralLogger );
      $login->attach( new PartnershipTool );

      print_r($login);

      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');

      }
}

Interface Observer {
  function update( Observable $observable );
}

Interface Observable {
  function attach ( Observer $observable );
  function detach ( Observer $observable );
  function notify();
}

class Login implements Observable {
  const LOGIN_USER_UNKNOWN = 1;
  const LOGIN_WRONG_PASS = 2;
  const LOGIN_ACCESS = 3;
  public $observers;
  private $status = array();

  function __construct() {}

  function attach ( Observer $observer ) {
    $this->observers[] = $observer;
  }

  function detach ( Observer $observer ) {
    $newObservers = array();
    foreach ( $this->observers as $obs ) {
      if ( ($obs !== $observer) ) {
        $newObservers[] = $obs;
      }
    }
    $this->observers = $newObservers;
  }

  function notify() {
    foreach ( $this->observers as $obs ) {
      $obs->update ( $this );
    }
  }

  function handleLogin ( $user, $pass, $ip ) {
      switch ( rand(1,3) ) {
        case 1:
            $this->setStatus( self::LOGIN_ACCESS, $user, $ip );
            $ret = true; break;
        case 2:
            $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip );
            $ret = true; break;
        case 3;
            $this->setStatus( self::LOGIN_USER_UNKNOWN, $user, $ip );
            $ret = true; break;
          }
      $this->notify();
      return $ret;
      }


  function setStatus ( $status, $user, $ip ) {
    $this->status = array ( $status, $user, $ip );
  }

  function getStatus () {
    return $this->status;
  }

}

class SecurityMonitor implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    if ( $status[0] == Login::LOGIN_WRONG_PASS ) {
      // send mail to sysadmin
      print __CLASS__.":\tsending mail to sysadmin\n";
    }
  }
}


class GeneralLogger implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    // add login data to log
    print __CLASS__.":\t\tadd login data to log\n";
    }
  }


class PartnershipTool implements Observer {
  function Update( Observable $login) {
    $status = $login->getStatus();
    // check IP address
    // set cookie if it matches a list
    print __CLASS__.":\tset cookie if IP matches a list\n";
    }
  }



 ?>
