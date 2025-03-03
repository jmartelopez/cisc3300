<?php

require 'in_class_14_project/Item.php';

use in_class_14_project\Item;

$Item1 = new Item('Camera', 350 );
$Item2 = new Item('Film', 25 );

echo $Item1->name;
$Item1->StateItem();
echo $Item1->price;
echo "<br>";
echo $Item2->name;
$Item2->StateItem();
echo $Item2->price;

