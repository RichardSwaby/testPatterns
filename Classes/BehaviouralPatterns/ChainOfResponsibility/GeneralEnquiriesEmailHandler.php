<?php
namespace Classes\BehaviouralPatterns\ChainOfResponsibility;

class GeneralEnquiriesEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ();  // match nothing
  }

  protected function handleHere($email) {
    return 'Email handled by general enquiries';
  }
}
 ?>
