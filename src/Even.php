<?php

namespace Brain\Games\Even;

use function Brain\Games\Cli\greeting;
use function cli\line;
use function cli\prompt;

const COUNT_OF_TRY = 3;

function isEven(int $num): bool
{
    if (!($num % 2)) {
        return true;
    }
    return false;
}

function run(): void
{
    greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $i = 0;
    do {
        $num = random_int(1, 22);
        $rigthAnswer = isEven($num) ? 'yes' : 'no';
        line("Question: {$num}");
        $answer = prompt('Your answer');
        if ($answer != $rigthAnswer) {
            line("Not correct! The rigth answer is '{$rigthAnswer}'");
            break;
        }
        line('Correct!');
        $i++;
    } while ($i < COUNT_OF_TRY);
    $result = ($i != COUNT_OF_TRY) ?  'You are lose.' : 'You are win!';
    line($result);
}
