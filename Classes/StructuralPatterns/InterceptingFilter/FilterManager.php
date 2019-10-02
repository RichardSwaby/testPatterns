<?php
namespace Classes\StructuralPatterns\InterceptingFilter;

class FilterManager {
  private $filterChain;

  function __construct( FilterChain $filterChain, Target $target) {
    $this->filterChain = $filterChain;

    $this->filterChain->setTarget($target);
  }

  function setFilter(AbstractFilter $filter ) {
    $this->filterChain->addFilter($filter);
  }

  function filterRequest(string $request ) {
    $this->filterChain->execute( $request );
  }
}
 ?>
