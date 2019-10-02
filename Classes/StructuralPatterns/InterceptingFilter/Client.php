<?php
namespace Classes\StructuralPatterns\InterceptingFilter;

class Client {
  private $filterManager;

  function __construct() {}

  function setFilterManager( FilterManager $filterManager ) {
    $this->filterManager = $filterManager;
  }

  function sendRequest ( string $request ) {
    $this->filterManager->filterRequest( $request );
  }
}
 ?>
