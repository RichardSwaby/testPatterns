<?php
namespace Classes\BehaviouralPatterns\Observer;
use Interfaces\BehaviouralPatterns\Observer\Observable;
use Interfaces\BehaviouralPatterns\Observer\Observer;

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
 ?>
