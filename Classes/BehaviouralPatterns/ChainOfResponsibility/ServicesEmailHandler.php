<?php
namespace Classes\BehaviouralPatterns\ChainOfResponsibility;

class ServicesEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ('service', 'repair');
  }

  protected function handleHere($email) {
    return 'Email handled by services department';
  }
}
 ?>
