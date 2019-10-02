<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

class MainProcess extends AbstractProcessRequest {
  function process(RequestHelper $req ) {
    print __CLASS__.":\t\t doing something useful with request\n";
  }
}

 ?>
