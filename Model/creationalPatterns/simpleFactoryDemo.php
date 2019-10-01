<?php
namespace Model\creationalPatterns;
header('Content-Type: text/plain');

// The factory is a design pattern which aims to reduce the dependencies between
// classes instantiating (creating) objects and the objects themselves,
// by creating a “factory” class which handles the creation of classes.
// By doing this, we allow subclasses to redefine which class to instantiate,
// and group potentially complex creation logic into a single interface.

// Factory design patterns allow the creation of instances of objects which
// implement a common interface, without necessarily knowing beforehand the
// exact concrete class (implementation) being used.

// It is not a "true" pattern
// Encapsulates object creation in one place
//   Should be the only part of the application that referes to concrete classes
// Reduces duplicate code by enforcing DRY


// Copyright Information
// =============================
// CreationalPatterns - SimplePizzaFactory.cs
// All samples copyright Philip Japikse
// http://www.skimedic.com 20/06/2017
// See License.txt for more information
// =============================


class simpleFactoryDemo {
  const NEWYORK = "NewYork";
  const CHICAGO = "Chicago";
  const CALIFORNIA = "California";

  static function execute() {
    $newYorkPizza = SimplePizzaFactory::CreatePizza(simpleFactoryDemo::NEWYORK, array('ham', 'salami', 'mushrooms'));
    $chicagoPizza = SimplePizzaFactory::CreatePizza(simpleFactoryDemo::CHICAGO, array('ham', 'salami', 'mushrooms'));
    $californiaPizza = SimplePizzaFactory::CreatePizza(simpleFactoryDemo::CALIFORNIA, array('ham', 'salami', 'mushrooms'));
    print_r($newYorkPizza);
    print_r($chicagoPizza);
    print_r($californiaPizza);
  }
}

  class SimplePizzaFactory
  {
      public static function CreatePizza(string $type, array $ingredients)
      {
          switch ($type)
          {
              case simpleFactoryDemo::NEWYORK:
                  return new NewYorkPizza($ingredients);
              case simpleFactoryDemo::CHICAGO:
                  return new ChicagoPizza($ingredients);
              case simpleFactoryDemo::CALIFORNIA:
                  return new CaliforniaPizza($ingredients);
              default:
                  return null;
          }
      }
  }

  abstract class IPizza
  {
      public $toppings = array();
      public $dough;
      public $seasonings;
      public $sauceType;
      protected abstract function Bake();
      protected abstract function Cut();
      protected abstract function Box();

      protected function _construct_(array $ingredients)
      {
          $this->toppings = $ingredients;
      }

  }
  class NewYorkPizza extends IPizza
  {
      public function _construct_(array $ingredients)
      {
          parent::_construct_($ingredients);
          $this->dough = "thin";
      }

      public  function Bake() { }
      public  function Cut() { }
      public  function Box() { }
  }

  class ChicagoPizza extends IPizza
  {
      public function _construct_(array $ingredients)
      {
          $this->dough = "Pan";
      }
      public  function Bake() { }
      public  function Cut() { }
      public  function Box() { }
  }
  class CaliforniaPizza extends IPizza
  {
      public function _construct_(array $ingredients)
      {
          $this->dough = "None";
      }
      public  function Bake() { }
      public  function Cut() { }
      public  function Box() { }
  }

}
  ?>
