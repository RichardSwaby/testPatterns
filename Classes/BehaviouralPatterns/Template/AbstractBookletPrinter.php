<?php
namespace Classes\BehaviouralPatterns\Template;

abstract class AbstractBookletPrinter {
  protected abstract function getPageCount();
  protected abstract function printFrontCover();
  protected abstract function printTableOfContents();
  protected abstract function printPage(int $pageNumber);
  protected abstract function printIndex();
  protected abstract function printBackCover();

  // this is the template method

  public function printBooklet() {
    $this->printFrontCover();
    $this->printTableOfContents();

    for ($i=1; $i <= $this->getPageCount(); $i++) {
      $this->printPage($i);
    }

    $this->printIndex();
    $this->printBackCover();
  }
}
 ?>
