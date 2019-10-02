<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

class LogRequest extends AbstractDecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t\t logging request\n";
    $this->processrequest->process( $req );
  }
}
 ?>
