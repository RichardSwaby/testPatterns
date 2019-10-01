<?php
header('Content-Type: text/plain');
namespace Model\creationalPatterns;
// The factory is a design pattern which aims to reduce the dependencies between
// classes instantiating (creating) objects and the objects themselves,
// by creating a “factory” class which handles the creation of classes.
// By doing this, we allow subclasses to redefine which class to instantiate,
// and group potentially complex creation logic into a single interface.

// Factory design patterns allow the creation of instances of objects which
// implement a common interface, without necessarily knowing beforehand the
// exact concrete class (implementation) being used.
// A common situation in which this is useful is when a parent class is
// relying on it’s children classes to specify the type of object it should be instantiating.
// It is also useful when the creation of an object is complex,
// as it allows the code to be grouped into a single class and reduce duplication.

// The abstract factory pattern provides a way to encapsulate a group of
// individual factories that have a common theme wirhout specifying their
// concrete classes.

// In normal usage, the client software creates a concrete implementation of the
// ablstract factory and then uses the generic interface of the factory to create
// the concrete objects that are part of the theme

// This pattern separates the details of implementation of a set of objects from
// their general usage and relies on object composition, as object createion is
// implemented in methods exposed in the factory interface.

class AbstractFactoryDemo {
  static function execute() {
}

/ Copyright Information
// =============================
// CreationalPatterns - PizzaStoreWithAbstractFactory.cs
// All samples copyright Philip Japikse
// http://www.skimedic.com 20/06/2017
// See License.txt for more information
// =============================


namespace t;
{
    public abstract class PizzaStoreWithAbstractFactory
    {
        private readonly IPizzaFactory _factory;

        protected PizzaStoreWithAbstractFactory(IPizzaFactory factory)
        {
            _factory = factory;
        }

        public function OrderPizza(array $ingredients)
        {
            IPizza pizza = _factory.CreatePizza($ingredients);
            pizza.Bake();
            pizza.Cut();
            pizza.Box();
            return pizza;
        }
    }

    public class NewYorkPizzaStoreWithAbstractFactory :
        PizzaStoreWithAbstractFactory
    {
        public NewYorkPizzaStoreWithAbstractFactory() :
            this(new NewYorkPizzaFactory()) { }
        public NewYorkPizzaStoreWithAbstractFactory(
            IPizzaFactory pizzaFactory) :
            base(pizzaFactory) { }

    }
    public class ChicagoPizzaStoreWithAbstractFactory : PizzaStoreWithAbstractFactory
    {
        public ChicagoPizzaStoreWithAbstractFactory() :
            this(new ChicagoPizzaFactory()) { }
        public ChicagoPizzaStoreWithAbstractFactory(IPizzaFactory pizzaFactory)
            : base(pizzaFactory) { }
    }
    public class CaliforniaPizzaStoreWithAbstractFactory : PizzaStoreWithAbstractFactory
    {
        public CaliforniaPizzaStoreWithAbstractFactory() :
            this(new CaliforniaPizzaFactory()) { }
        public CaliforniaPizzaStoreWithAbstractFactory(IPizzaFactory pizzaFactory)
            : base(pizzaFactory) { }
    }

    public interface IPizzaFactory
    {
        CreatePizza(array $ingredients);
    }

    public abstract class PizzaFactory extends IPizzaFactory
    {
        public abstract CreatePizza(array $ingredients);
    }

    public class NewYorkPizzaFactory extends PizzaFactory
    {
        public function CreatePizza(array $ingredients)
        {
            return new NewYorkPizza($ingredients);
        }
    }

    public class ChicagoPizzaFactory extends PizzaFactory
    {
        public function CreatePizza(array $ingredients)
        {
            return new ChicagoPizza($ingredients);
        }
    }

    public class CaliforniaPizzaFactory extends PizzaFactory
    {
        public function CreatePizza(array $ingredients)
        {
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
