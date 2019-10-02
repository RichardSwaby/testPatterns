<?php
namespace Classes\StructuralPatterns\InterceptingFilter;

class LogFilter extends AbstractFilter {
  function execute ( string $request ) {
    print_r ("Logging request:" . $request . "\n" );
  }
}
 ?>
