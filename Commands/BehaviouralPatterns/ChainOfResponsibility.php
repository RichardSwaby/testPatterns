<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\ChainOfResponsibility\AbstractEmailHandler;
header('Content-Type: text/plain');

// Avoid coupling the sender of a request to its receiver by giving more than one
// object a chance to handle the request.
// Chain the receiving objects and pass the request along the chain until an object handles it.

class ChainOfResponsibility  implements ICommand {
    static function execute($context) {
        $email = "I would like to complain about my treatment.";
        echo $email . "\n";
        AbstractEmailHandler::handle($email);
        echo "\n\n";

        $email = "Could you repair my mobile phone screen?";
        echo $email . "\n";
        AbstractEmailHandler::handle($email);
        echo "\n\n";

        $email = "Lose fat with these slimming pills";
        echo $email . "\n";
        AbstractEmailHandler::handle($email);
        echo "\n\n";

        $email = "I would like to buy a yacht";
        echo $email . "\n";
        AbstractEmailHandler::handle($email);
        echo "\n\n";

        $email = "Got any jobs?";
        echo $email . "\n";
        AbstractEmailHandler::handle($email);
        echo "\n\n";
  }
}
