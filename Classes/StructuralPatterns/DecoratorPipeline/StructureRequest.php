<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

class StructureRequest extends AbstractDecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t\t structuring request\n";
    $this->processrequest->process( $req );
  }
}
 ?>
