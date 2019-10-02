<?php
namespace Classes\BehaviouralPatterns\Template;

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
 ?>
