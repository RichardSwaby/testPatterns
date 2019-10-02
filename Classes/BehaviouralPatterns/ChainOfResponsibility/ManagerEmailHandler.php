<?php
namespace Classes\BehaviouralPatterns\ChainOfResponsibility;

class ManagerEmailHandler extends AbstractEmailHandler {
  protected function matchingWords () {
    return array ('complain', 'bad');
  }

  protected function handleHere($email) {
    return 'Email handled by Manager';
  }
}
 ?>
