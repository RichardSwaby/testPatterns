<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

abstract class AbstractDecorateProcess extends AbstractProcessRequest {
  protected $processrequest;
  function __construct(AbstractProcessRequest $pr ) {
    $this->processrequest = $pr;
  }
}
 ?>
