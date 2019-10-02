<?php
namespace Interfaces\BehaviouralPatterns\State;

interface ClockSetupState {

public function previousValue();
public function nextValue();
public function getInstructions();
public function getSelectedValue();
}
 ?>
