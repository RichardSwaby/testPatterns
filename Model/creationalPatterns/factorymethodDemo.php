<?php
header('Content-Type: text/plain');
namespace Model\creationalPatterns;
// The factory mentod pattern uses factory methods to deal with the problem of
// creaing objects without having to specify the exact class of the object that
// will be created.

// This is done by creating objects by calling a factory method - either
// specified in an interface and implemented by child classes, or implemented
// in a base class and optionally overridden by derived classes - rather than
// by calling a constructor.

// The factory is a concrete object the products produced by the factory are
// concrete products of an interface class
// The factory uses a switch to instantiate an object of type passed to its
// method by the client
// The client doesn't use conditional statements or the new statement to do this

class Factorymethoddemo {
  static function execute() {

}

// Copyright Information
// =============================
// CreationalPatterns - PizzaStore.cs
// All samples copyright Philip Japikse
// http://www.skimedic.com 20/06/2017
// See License.txt for more information
// =============================

namespace t;
{

    public abstract class PizzaStore
    {
        public IPizza OrderPizza(array $ingredients)
        {
            pizza = CreatePizza($ingredients);
            pizza.Bake();
            pizza.Cut();
            pizza.Box();
            return pizza;
        }
        public abstract IPizza CreatePizza(array $ingredients);
    }

    public class NewYorkPizzaStore extends PizzaStore
    {
        public function CreatePizza(array $ingredients)
        {
            //This is tied to a specific pizza implementation
            return new NewYorkPizza($ingredients);
        }
    }

    public class ChicagoPizzaStore extends PizzaStore
    {
        public function CreatePizza(array $ingredients)
        {
            //This is tied to a specific pizza implementation
            return new ChicagoPizza($ingredients);
        }
    }

    public class CaliforniaPizzaStore extends PizzaStore
    {
        public function CreatePizza(array $ingredients)
        {
            //This is tied to a specific pizza implementation
            return new CaliforniaPizza($ingredients);
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
