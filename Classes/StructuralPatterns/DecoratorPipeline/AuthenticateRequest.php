<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

class AuthenticateRequest extends AbstractDecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t authenticating request\n";
    $this->processrequest->process( $req );
  }
}
 ?>
