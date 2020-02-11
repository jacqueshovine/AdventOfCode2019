<?php

$data_input = file_get_contents('wire1.txt');

$data_array = explode(",", $data_input);

function gravity_assistant (Array $intcode) {

    $opcode = $intcode[0];
    $opcode_position = 0;

    do {

        if ($opcode == 1) {
            $intcode[$intcode[$opcode_position + 3]] = $intcode[$intcode[$opcode_position + 1]] + $intcode[$intcode[$opcode_position + 2]];
        } else if ($opcode == 2) {
            $intcode[$intcode[$opcode_position + 3]] = $intcode[$intcode[$opcode_position + 1]] * $intcode[$intcode[$opcode_position + 2]];
        }

        $opcode_position += 4;
        $opcode = $intcode[$opcode_position];

    } while ($opcode != 99);

    $output = $intcode;

    return $output;
}

//$data_array[1] = 12;
//$data_array[2] = 2;
//$output = gravity_assistant($data_array);

$output = gravity_assistant($data_array);
$noun = 0;
$verb = 0;

for ($i = 0; $i <= 99; $i++) {

    for ($j = 0; $j <= 99; $j++) {

        if ($output[0] === 19690720) {
            $noun = $i;
            $verb = $j - 1; // Parce que $j a déjà été incrémenté
            $code = 100 * $noun + $verb;
            break 2;
        }

        $data_array_copy = $data_array;

        $data_array_copy[1] = $i;
        $data_array_copy[2] = $j;

//        echo $data_array_copy[1] . " - " . $data_array_copy[2] . "\n";

        $output = gravity_assistant($data_array_copy);
     }
}

echo "Le code est : " . $code;

//} while ($output[0] !== 19690720);