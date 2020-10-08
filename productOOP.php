<?php
Class Product{//Class for all the products that can be ordered
    public string $name;
    public float $price;
    public bool $food;//Represents if the product is a food or a drink, true is food, false is drink
    public int $amount = 0;//Represents how many of this product are ordered

    public function setAmount(int $amount){
        $this->amount = $amount;//Changes the amount ordered
    }

    public function __construct($name, $price, $food){//Constructor to simplify making new products
        $this->name = $name;//This refers to the class in this case Product
        $this->price = $price;
        $this->food = $food;

    }

}
$clubHam = new Product('Club Ham', 3.20, true);
$clubCheese = new Product('Club Cheese', 3, true);
$clubCheeseHam = new Product('Club Cheese & Ham', 4, true);
$clubChicken = new Product('Club Chicken', 4, true);
$clubSalmon = new Product('Club Salmon', 5, true);
$cola = new Product('Cola', 2, false);
$fanta = new Product('Fanta', 2, false);
$sprite = new Product('Sprite', 2, false);
$icetea = new Product('Ice-tea', 3, false);

$products = [$clubHam, $clubCheese, $clubCheeseHam, $clubChicken, $clubSalmon, $cola, $fanta, $sprite, $icetea];

