<?php

$foodOrDrink = htmlspecialchars($_GET['food']);// Will be 1 on default and become 0 if drinks is pressed, 1 if food is pressed
$products = [
    ['name' => 'Club Ham', 'price' => 3.20, 'type' => 1],
    ['name' => 'Club Cheese', 'price' => 3, 'type' => 1],
    ['name' => 'Club Cheese & Ham', 'price' => 4, 'type' => 1],
    ['name' => 'Club Chicken', 'price' => 4, 'type' => 1],
    ['name' => 'Club Salmon', 'price' => 5, 'type' => 1],
    ['name' => 'Cola', 'price' => 2, 'type' => 0],
    ['name' => 'Fanta', 'price' => 2, 'type' => 0],
    ['name' => 'Sprite', 'price' => 2, 'type' => 0],
    ['name' => 'Ice-tea', 'price' => 3, 'type' => 0],
];