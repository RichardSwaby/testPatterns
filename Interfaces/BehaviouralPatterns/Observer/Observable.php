<?php
namespace Interfaces\BehaviouralPatterns\Observer;

Interface Observable {
  function attach ( Observer $observer );
  function detach ( Observer $observer );
  function notify();
}
 ?>
