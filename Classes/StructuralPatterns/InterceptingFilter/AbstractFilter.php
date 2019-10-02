<?php
namespace Classes\StructuralPatterns\InterceptingFilter;
use Interfaces\StructuralPatterns\InterceptingFilter\IFilter;

abstract class AbstractFilter implements IFilter {
  abstract function execute (string $request);
}

 ?>
