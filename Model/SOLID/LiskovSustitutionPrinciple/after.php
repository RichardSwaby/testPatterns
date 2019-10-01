<?php
namespace t;
header('Content-Type: text/plain');

// If S is a subtype of T then objects of type T maybe replaced with objects of type S
// From Tim Corey's Youtube channel. I have converted it to php from c#

class LiskovSubstitutionPrincipleDemo {
  static function execute() {
    $CEO = new CEO($firstName='Reginald', $lastName='Fortesque');


    print_r ($CEO);
    $CEO->CalculatePerHourRate(30);
    echo "The salary of $CEO->firstName is $CEO->salary per hour\n";
    $CEO->FireSomeone();

    $accountingVP = new Manager($firstName='Emma', $lastName='Stone');
    $accountingVP->AssignManager($CEO);
    $accountingVP->CalculatePerHourRate(4);

    print_r ($accountingVP);
    echo "The salary of $accountingVP->firstName is $accountingVP->salary per hour\n";
    $accountingVP->GeneratePerformanceReview();

    $employee = new Employee($firstName='Tim', $lastName='Corey');
    $employee->AssignManager($accountingVP);
    $employee->CalculatePerHourRate(2);

    print_r($employee);
    echo "The salary of $employee->firstName is $accountingVP->salary per hour\n";
  }
}

interface IEmployee {
   public function CalculatePerHourRate( int $rank);
}

Interface IManaged extends IEmployee {
   public function AssignManager(IEmployee $manager);
}

Interface IManager extends IEmployee {
  public function GeneratePerformanceReview();
}

Interface IMiddleManager extends IEmployee, IManaged, IManager {
  public function GeneratePerformanceReview();
   public function AssignManager(IEmployee $manager);
}

class BaseEmployee implements IEmployee {
  public $firstName;
  public $lastName;
  public $salary;

  public function __construct(string $firstName, string $lastName) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function CalculatePerHourRate( int $rank ) {
    $baseAmount = 12.50;
    $this->salary = $baseAmount + ( $rank * 2 );
  }
}

class Employee extends baseEmployee implements IManaged {

  public $firstName;
  public $lastName;
  public $salary;
  public $manager;

  public function __construct(string $firstName, string $lastName) {
    parent::__construct($firstName, $lastName);
  }
  public function AssignManager(IEmployee $manager) {
    $this->manager = $manager;
  }
}

class Manager extends baseEmployee implements IMiddleManager {

  public $firstName;
  public $lastName;
  public $salary;
  public $manager;

  public function __construct(string $firstName, string $lastName) {
    parent::__construct($firstName, $lastName);
  }

  public function AssignManager(IEmployee $manager) {
    $this->manager = $manager;
  }

  public function GeneratePerformanceReview() {
        echo 'I am reviewing the performance of a direct report' . "\n";
  }
}

class CEO extends baseEmployee implements IManager {

  public $firstName;
  public $lastName;
  public $salary;

  public function __construct(string $firstName, string $lastName) {
    parent::__construct($firstName, $lastName);
  }

  public function GeneratePerformanceReview() {
    echo 'I am reviewing the performance of a direct report' . "\n";
  }

  public function FireSomeone() {
    echo 'Tou are fired!' . "\n";
  }
}
