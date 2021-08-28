<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\game;

const MAX_INT_NUM_1 = 200;
const MIN_INT_NUM_1 = 1;
const MAX_INT_NUM_2 = 100;
const MIN_INT_NUM_2 = 0;


function gcd(int $num1, int $num2): int
{
    if ($num1 == 0) {
        return $num2;
    }
    return gcd($num2 % $num1, $num1);
}

function run(): void
{
    $title = 'Find the greatest common divisor of given numbers.';
    $genQuestion = function (): array {
        $num1 = random_int(MIN_INT_NUM_1, MAX_INT_NUM_1);
        $num2 = random_int(MIN_INT_NUM_2, MAX_INT_NUM_2);
        $question = "{$num1} {$num2}";
        $answer = gcd($num1, $num2);
        return [$question, $answer];
    };
    game($title, $genQuestion);
}
