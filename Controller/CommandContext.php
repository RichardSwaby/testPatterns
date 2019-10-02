<?php
namespace Controller;

class CommandContext {
  private $params = array();
  private $URI = array();
  private $error = "";

  function __construct() {

    if (isset( $_SERVER['REQUEST_METHOD'] ) ) {

//      $this->params = $_REQUEST;

      $this->URI = preg_split ("~[/?]~", $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
      $this->params['action']=$this->URI[1];
      $this->params['parameter'] = $this->URI[2];

//      preg_match_all("~([\.a-zA-Z]*)(?=[\/\?])+~", $_SERVER['REQUEST_URI'], $matches, PREG_UNMATCHED_AS_NULL, 0);
//      print_r($matches[1]);

//      for ($i=0; $i <sizeOf($matches[1]) ; $i++) {
//        echo $matches[1][$i];
//        if ($matches[1][$i]) {
//          $this->URI[] = $matches[1][$i];
//        }
//      }

      print_r($this->params);
      print_r($this->URI);
    }
  }



  function addParam( $key, $val ) {
    $this->params[$key]=$val;
  }

  function get( $key ) {
    return $this->params[$key];
  }

  function setError( $error ) {
    $this->error = $error;
  }

  function getError() {
    return $this->error;
  }
}
 ?>
