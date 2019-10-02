<?php
namespace Classes\BehaviouralPatterns\Template;

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
 ?>
