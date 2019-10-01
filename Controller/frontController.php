<?php
header('Content-Type: text/plain');
require_once $_SERVER['DOCUMENT_ROOT'] . '\testPatterns\Controller\Command.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\testPatterns\Controller\CommandFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\testPatterns\Controller\CommandContext.php';

print (DIRECTORY_SEPARATOR); echo "\n";
print '$_SERVER[\'QUERY_STRING\'] = '; print_r($_SERVER['QUERY_STRING']); echo "\n";
print '$_SERVER[\'REQUEST_URI\'] = '; print_r($_SERVER['REQUEST_URI']); echo "\n";
// phpinfo();



class Controller {
  private $context;

  function __construct() {
    $this->context = new CommandContext();
  }

  function getContext() {
    return $this->context;
  }

  function process() {

    $cmd = CommandFactory::getCommand( $this->context->get('action') );
    if ( ! $cmd->execute( $this->context ) ) {
      // handle failure
    }
    else {
      // success
      // dispatch view now ..
    }
  }
}

class CommandNotFoundException extends Exception {}
 ?>
