<?php
namespace Classes\StructuralPatterns\InterceptingFilter;

class FilterChain {
  private $filters = array();
  private $target;

  function __construct() {
  }

  function addFilter(AbstractFilter $filter ) {
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
 ?>
