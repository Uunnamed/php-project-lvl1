<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\game;

const MAX_NUMBER = 50;

function isEven(int $num): bool
{
    return $num % 2 == 0;
}



function run(): void
{
    $decription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $genQuestion = function (): array {
        $num = random_int(1, MAX_NUMBER);
        $answer = isEven($num) ? 'yes' : 'no';
        return [$num, $answer];
    };
    game($decription, $genQuestion);
}
