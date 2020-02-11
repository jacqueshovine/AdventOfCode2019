<?php

require("Point.php");

$raw_data_1 = file_get_contents('wire1.txt');
$wire1 = explode(",", $raw_data_1);

$raw_data_2 = file_get_contents('wire2.txt');
$wire2 = explode(",", $raw_data_2);

function getDirectionValue (string $direction) {
    return (int)substr($direction, 1);
}

function getPoints (Array $array) {

    $points = [];

    // Mémoire pour coordonnées actuelles
    $axisX = 0;
    $axisY = 0;

    foreach ($array as $direction) {

        switch ($direction[0]) {
            case 'R':
                $value = getDirectionValue($direction);
                $axisX += $value;

                $points[] = new Point($axisX, $axisY);
                break;
            case 'L':
                $value = getDirectionValue($direction);
                $axisX -= $value;

                $points[] = new Point($axisX, $axisY);
                break;
            case 'U':
                $value = getDirectionValue($direction);
                $axisY += $value;

                $points[] = new Point($axisX, $axisY);
                break;
            case 'D':
                $value = getDirectionValue($direction);
                $axisY -= $value;

                $points[] = new Point($axisX, $axisY);
                break;
        }

    }

    return $points;
}

function getIntersections ($array1, $array2) {

    $intersections = [];
    $x1 = 0;
    $x2 = 0;
    $y1 = 0;
    $y2 = 0;

    for ($i = 0; $i < count($array1); $i++) {

//        if ($i !== 0) {
//            if ($x1 <= $array2[$i] && $array1[$i] > 0 && )
//        }

        $x1 = $array1[$i]->getX();
        $x2 = $array2[$i]->getX();
        $y1 = $array1[$i]->getY();
        $y2 = $array2[$i]->getY();
    }

    return $intersections;
}

$points_wire1 = getPoints($wire1);
$points_wire2 = getPoints($wire2);

echo count($points_wire1);
echo count($points_wire2);
