<?php
namespace Model\structuralPatterns;
header('Content-Type: text/plain');

// Pipeline using Decorator pattern
// See here how we execute a series of requests (Authentication, Structuring
// and logging) on a main process

class decoratorPipelineDemo {

  static function execute() {
    $process =  new AuthenticateRequest(
                new StructureRequest(
                new LogRequest(
                new MainProcess()
                )));
    print_r($process);
    $process->process( new RequestHelper() );
  }
}

class RequestHelper{}

abstract class ProcessRequest{
    abstract function process(RequestHelper $req );
}

class MainProcess extends ProcessRequest {
  function process(RequestHelper $req ) {
    print __CLASS__.":\t\t doing something useful with request\n";
  }
}

abstract class DecorateProcess extends ProcessRequest {
  protected $processrequest;
  function __construct(ProcessRequest $pr ) {
    $this->processrequest = $pr;
  }
}

class LogRequest extends DecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t\t logging request\n";
    $this->processrequest->process( $req );
  }
}

class AuthenticateRequest extends DecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t authenticating request\n";
    $this->processrequest->process( $req );
  }
}

class StructureRequest extends DecorateProcess {
  function process( RequestHelper $req) {
    print __CLASS__.":\t structuring request\n";
    $this->processrequest->process( $req );
  }
}



 ?>
