<?php
namespace t;
header('Content-Type: text/plain');

// High level modules should not depend on low level modules
// rather they should both depend on abstractions
// and those abstractions should not depend on details

// example from @DevelopmentMatt

// dependency injection is mainly for injecting the concrete implementation into a class that is using abstraction
// This is done in one of three ways:=
// 1. Construc;tor injection
// 2. Method injection
// 3. Property injection

// From Tim Corey's Youtube channel. I have converted it to php from c#

class DependencyInversionPrincipleDemo {
  static function execute() {
    $superhero = new Superhero('Caffeine Man');
    $superheroComic = new ComicBook($superhero);  // constructor injection

    print_r ($superheroComic);

    $vampireDog = new Superhero('Mr. Fangz');
    $vampireComic = new ComicBook($vampireDog);   // constructor injection

    print_r ($vampireComic);
  }
}

interface CharacterInterface {
  public function getName();
}

abstract class Character implements CharacterInterface {
  public $name;

  public function getName() {
    return $this->name;
  }
}

class Superhero extends character {

  public function __construct( string $name) {
    $this->name = $name;
  }
}

class VampiricDog extends character {

  public function __construct( string $name) {
    $this->name = $name;
  }
}

class ComicBook {
  public $name;

// We pass the object of the low level class into the constructor of the higher level class
// This is called Constructor injection

  public function __construct(CharacterInterface $character) {
    $this->mainCharacter = $character;
    $this->name = 'The adventures of ' . $character->getName();
  }
}
