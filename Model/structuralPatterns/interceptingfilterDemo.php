<?php
namespace Model\structuralPatterns;
header('Content-Type: text/plain');

// The process is the intercepting filter pattern is such that,
// the client invokes a request and sends it to the filter manager.
// The filter manager is the creator of both, the filter chain and
// the filter object and it manages both as well.
// There is an exchange of processed and the processed data between
// filter object and filter chain. Filter chain then invokes the processed
// request back to the target (request handler).

// copied from sitepoint and converted from Java to php

class interceptingfilterDemo {
  static function execute() {
    print_r ("Lets go\n");

    $filterChain = new FilterChain;
    $filterManager = new FilterManager ( $filterChain, new Target() ) ;
    print_r ($filterManager);
    $filterManager->setFilter( new AuthenticationFilter() );
    print_r ($filterManager);
    $filterManager->setFilter ( new LogFilter() );
    print_r ($filterManager);

    $client = new Client();
    $client->setFilterManager($filterManager);
    $client->sendRequest("HOME");

  }
}

Interface Filter {
  function execute(string $request);
}

class AuthenticationFilter implements Filter {
  function execute (string $request ) {
    print_r ("Authenticating request: " . $request . "\n" ) ;
  }
}

class LogFilter implements Filter {
  function execute ( string $request ) {
    print_r ("Logging request:" . $request . "\n" );
  }
}

class Target {
  function execute (string $request ) {
    print_r ("Executing request: " . $request . "\n" );
  }
}

class FilterChain {
  private $filters = array();
  private $target;

  function __construct() {
  }

  function addFilter(Filter $filter ) {
    array_push($this->filters, $filter);
  }

  function execute (string $request ) {
    foreach ($this->filters as $filter) {
      $filter->execute($request);
      }
    $this->target->execute($request);
    }

  function setTarget(Target $target) {
    $this->target = $target;
  }
}

class FilterManager {
  private $filterChain;

  function __construct( FilterChain $filterChain, Target $target) {
    $this->filterChain = $filterChain;

    $this->filterChain->setTarget($target);
  }

  function setFilter(Filter $filter ) {
    $this->filterChain->addFilter($filter);
  }

  function filterRequest(string $request ) {
    $this->filterChain->execute( $request );
  }
}

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
