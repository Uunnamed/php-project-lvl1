<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\game;

function isEven(int $num): bool
{
    if (!($num % 2)) {
        return true;
    }
    return false;
}



function run(): void
{
    $genQuestion = function () {
        $num = random_int(1, 22);
        $rigthAnswer = isEven($num) ? 'yes' : 'no';
        return [$num, $rigthAnswer];
    };
    $title = 'Answer "yes" if the number is even, otherwise answer "no".';
    game($title, $genQuestion);
}
