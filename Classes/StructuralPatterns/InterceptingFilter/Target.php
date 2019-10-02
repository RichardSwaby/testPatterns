<?php
namespace Classes\StructuralPatterns\InterceptingFilter;

class Target {
  function execute (string $request ) {
    print_r ("Executing request: " . $request . "\n" );
  }
}
 ?>
