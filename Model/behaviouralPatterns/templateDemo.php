<?php
namespace Model\behaviouralPatterns;
header('Content-Type: text/plain');

// Define the skeleton of an algorithm in a function, deferring some steps to subclasses.
// Template Method lets subclasses redefine certain steps of an algorithm
// without changing the algorithm;s structure.

class templateDemo {
    static function execute() {
      $saloonBooklet = new SaloonBooklet();
      $saloonBooklet->printBooklet();

      echo "\n";

      $serviceBooklet = new ServiceHistoryBooklet();
      $serviceBooklet->printBooklet();
    }
}

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

class SaloonBooklet extends AbstractBookletPrinter {
  protected function  getPageCount() {
    return 100;
  }
  protected function  printFrontCover() {
    echo 'printing front cover for Saloon car booklet' . "\n";
  }
  protected function  printTableOfContents() {
    echo 'printing table of contents for Saloon car booklet' . "\n";
  }
  protected function  printPage(int $pageNumber) {
    echo 'printing page ' . $pageNumber . ' for Saloon car booklet' . "\n";
  }
  protected function printIndex()  {
    echo 'printing index for Saloon car booklet' . "\n";
  }
  protected function  printBackCover() {
    echo 'printing back cover for Saloon car booklet' . "\n";
  }
}

class ServiceHistoryBooklet extends AbstractBookletPrinter {
  protected function  getPageCount() {
    return 12;
  }
  protected function  printFrontCover() {
    echo 'printing front cover for service history booklet' . "\n";
  }
  protected function  printTableOfContents() {
    echo 'printing table of contents for service history booklet' . "\n";
  }
  protected function  printPage(int $pageNumber) {
    echo 'printing page ' . $pageNumber . ' for service history booklet' . "\n";
  }
  protected function printIndex()  {
    echo 'printing index for service history booklet' . "\n";
  }
  protected function  printBackCover() {
    echo 'printing back cover for service history booklet' . "\n";
  }
}
