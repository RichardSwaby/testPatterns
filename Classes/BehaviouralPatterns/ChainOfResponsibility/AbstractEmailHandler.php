<?php
namespace Classes\BehaviouralPatterns\ChainOfResponsibility;
use Interfaces\BehaviouralPatterns\ChainOfResponsibility\EmailHandler;
use Classes\BehaviouralPatterns\ChainOfResponsibility\SpamEmailHandler;
use Classes\BehaviouralPatterns\ChainOfResponsibility\GeneralEnquiriesEmailHandler;
use Classes\BehaviouralPatterns\ChainOfResponsibility\SalesEmailHandler;
use Classes\BehaviouralPatterns\ChainOfResponsibility\ServicesEmailHandler;
use Classes\BehaviouralPatterns\ChainOfResponsibility\ManagerEmailHandler;

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

 ?>
