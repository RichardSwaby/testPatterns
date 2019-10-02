<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\InterceptingFilter\FilterChain;
use Classes\StructuralPatterns\InterceptingFilter\LogFilter;
use Classes\StructuralPatterns\InterceptingFilter\FilterManager;
use Classes\StructuralPatterns\InterceptingFilter\AuthenticationFilter;
use Classes\StructuralPatterns\InterceptingFilter\Target;
use Classes\StructuralPatterns\InterceptingFilter\Client;

header('Content-Type: text/plain');

// The process is the intercepting filter pattern is such that,
// the client invokes a request and sends it to the filter manager.
// The filter manager is the creator of both, the filter chain and
// the filter object and it manages both as well.
// There is an exchange of processed and the processed data between
// filter object and filter chain. Filter chain then invokes the processed
// request back to the target (request handler).

// copied from sitepoint and converted from Java to php

class InterceptingFilter implements ICommand {
  static function execute($context) {
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

 ?>
