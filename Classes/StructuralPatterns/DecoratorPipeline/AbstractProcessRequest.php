<?php
namespace Classes\StructuralPatterns\DecoratorPipeline;

abstract class AbstractProcessRequest{
    abstract function process(RequestHelper $req );
}
 ?>
