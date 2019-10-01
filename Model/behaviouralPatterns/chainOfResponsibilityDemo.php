<?php
namespace Model\behaviouralPatterns;
header('Content-Type: text/plain');

// Avoid coupling the sender of a request to its receiver by giving more than one
// object a chance to handle the request.
// Chain the receiving objects and pass the request along the chain until an object handles it.

class chainOfResponsibilityDemo  {
    function execute() {
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

interface EmailHandler {
  public function setNextHandler (EmailHandler $handler);
  public function processHandler ($email);
}

abstract class AbstractEmailHandler implements EmailHandler {
  private $nextHandler;

  public function setNextHandler (EmailHandler $nextHandler) {
    $this->nextHandler = $nextHandler;
  }

  public static function handle($email) {
    // Create the handler objects
    $spam = new SpamEmailHandler();
    $sales = new SalesEmailHandler();
    $service = new ServicesEmailHandler();
    $manager = new ManagerEmailHandler();
    $general = new GeneralEnquiriesEmailHandler();

    // Chain them together
    $spam->setNextHandler($sales);
    $sales->setNextHandler($service);
    $service->setNextHandler($manager);
    $manager->setNextHandler($general);

    // start the ball rolling
    echo $spam->processHandler($email);
  }


  public function processHandler ($email) {
    $wordFound = false;

    // if no words to match against then this object can handle

    if ( null == $this->matchingWords() ) {
      $wordFound = true;
    }
    else {

          // look for any of the matching words
          foreach ($this->matchingWords() as $word) {
            if (strpos($email, $word) !== false) {
              $wordFound = true;
              break;
            }
          }
      }

      // can we handle email in this object?
      if ($wordFound == true) {
        return $this->handleHere($email);
      }
      else {
          // unable to handle here so forward to next in chain
          return $this->nextHandler->processHandler($email);
      }
  }
}

class SpamEmailHandler extends AbstractEmailHandler {

  protected function matchingWords () {
    return array ('viagra', 'pills', 'medicines');
  }

  protected function handleHere($email) {
    return 'This is a spam email';
  }
}

  class SalesEmailHandler extends AbstractEmailHandler {
    protected function matchingWords () {
      return array ('buy', 'purchase');
    }

  protected function handleHere($email) {
    return 'Email handled by sales department';
  }
}


class ServicesEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ('service', 'repair');
  }

  protected function handleHere($email) {
    return 'Email handled by services department';
  }
}

class ManagerEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ('complain', 'bad');
  }

  protected function handleHere($email) {
    return 'Email handled by Manager';
  }
}

class GeneralEnquiriesEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ();  // match nothing
  }

  protected function handleHere($email) {
    return 'Email handled by general enquiries';
  }
}
