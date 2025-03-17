<?php
$flowers = [
    "Rose" => "red",
    "Sunflower" => "yellow",
    "Tulip" => "white"
];

foreach ($flowers as $key => $value) {
    echo "The color of a $key is $value.<br>";
}

function describeFlower(string $name, string $color = "unknown"): string {
    return "The most popular color of a $name is $color.";
}

echo describeFlower("Rose", "red") . "<br>";
echo describeFlower("Sunflower") . "<br>";
echo "<br>";

include 'homework-6.8.html';

?>