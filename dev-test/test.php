<?php

require '../vendor/autoload.php';

use function SebastianBergmann\ObjectGraph\object_graph_dump;

class Currency {

  protected $cur="";

  function __construct($cur) {
    $this->cur=$cur;
  }
}

class Money {

  protected $amount=0;
  protected $cur=null;

  function __construct($a, $c) {
    $this->amout=$a;
    $this->cur=$c;
  }
}

class ShoppingCartItem {

  protected $name="";
  protected $price=null;
  protected $amount=0;

  function __construct($n, $p, $a) {
    $this->name=$n;
    $this->price=$p;
    $this->amount=$a;
  }
}

class ShoppingCart {

  protected $items=[];

  public function add($i) {
    $this->items[]=$i;
  }
}

$cart = new ShoppingCart;
$cart->add(new ShoppingCartItem('Foo', new Money(123, new Currency('EUR')), 1));
$cart->add(new ShoppingCartItem('Bar', new Money(456, new Currency('EUR')), 1));

object_graph_dump('graph.png', $cart);
