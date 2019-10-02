<?php
namespace Classes\CreationalPatterns\Singleton;

class Preferences {
  private $props = array();
  private static $instance;

  private function __construct() {}       // construction is closed
  private function __clone() {}           // cloning is prohibited
  private function __sleep() {}           // serialization is prohibited
  private function __wakeup() {}          // deserialization is prohibited

  public static function getInstance() {
    if (empty(self::$instance ) ) {
      self::$instance = new Preferences();
    }
    return self::$instance;
  }

  public function setProperty( $key, $val ) {
    $this->props[$key] = $val;
  }

  public function getProperty( $key ) {
    return $this->props[$key];
  }
}

 ?>
