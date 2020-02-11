<?php

$data_input = file_get_contents('data_input.txt');

$data_array = preg_split("/\r\n|\n|\r/", $data_input);

function fuel_calculator (Array $module_array) {

    $total_fuel = 0;

    foreach ($module_array as $module) {

        $module_fuel = floor($module/3) - 2;

        if ($module_fuel > 0) {
            $total_fuel += $module_fuel;
            $total_fuel += fuel_calculator([$module_fuel]);
        }

    }

    return $total_fuel;
}

$total_fuel = fuel_calculator($data_array);

echo $total_fuel;
