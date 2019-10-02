<?php
namespace Classes\StructuralPatterns\InterceptingFilter;
use Interfaces\StructuralPatterns\InterceptingFilter\IFilter;

class AuthenticationFilter extends AbstractFilter {
  function execute (string $request ) {
    print_r ("Authenticating request: " . $request . "\n" ) ;
  }
}
 ?>
