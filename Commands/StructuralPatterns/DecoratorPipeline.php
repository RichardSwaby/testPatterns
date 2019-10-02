<?php
namespace Commands\StructuralPatterns;
use Controller\ICommand;
use Classes\StructuralPatterns\DecoratorPipeline\RequestHelper;
use Classes\StructuralPatterns\DecoratorPipeline\AuthenticateRequest;
use Classes\StructuralPatterns\DecoratorPipeline\StructureRequest;
use Classes\StructuralPatterns\DecoratorPipeline\LogRequest;
use Classes\StructuralPatterns\DecoratorPipeline\MainProcess;

header('Content-Type: text/plain');

// Pipeline using Decorator pattern
// See here how we execute a series of requests (Authentication, Structuring
// and logging) on a main process

class DecoratorPipeline implements ICommand{

  static function execute($context) {
    $process =  new AuthenticateRequest(
                new StructureRequest(
                new LogRequest(
                new MainProcess()
                )));
    print_r($process);
    $process->process( new RequestHelper() );
  }
}

 ?>
