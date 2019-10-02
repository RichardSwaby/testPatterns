<?php
namespace Commands\BehaviouralPatterns;
use Controller\ICommand;
use Classes\BehaviouralPatterns\Observer\Login;
use Classes\BehaviouralPatterns\Observer\SecurityMonitor;
use Classes\BehaviouralPatterns\Observer\GeneralLogger;
use Classes\BehaviouralPatterns\Observer\PartnershipTool;
header('Content-Type: text/plain');

// Define a one-to-many dependency between objects so that when one object changes
// its state, all its dependants are notified and updated automatically

class Observer implements ICommand{

  static function execute($context) {
      $login = new Login();

      $login->attach( new SecurityMonitor );
      $login->attach( new GeneralLogger );
      $login->attach( new PartnershipTool );

      print_r($login);

      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');
      $login->handleLogin('Richard', 'password1', '192-168-1-174');

      }
}


 ?>
