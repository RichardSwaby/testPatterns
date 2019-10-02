<?php
namespace Controller;

interface ICommand {
  static function execute ( CommandContext $context );
}

 ?>
