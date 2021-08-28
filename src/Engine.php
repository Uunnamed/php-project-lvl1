<?php

namespace Brain\Games\Engine;

use function Brain\Games\Cli\greeting;
use function cli\line;
use function cli\prompt;

const COUNT_OF_TRY = 3;


function game($title, $fnGenQuestion): void
{
    greeting();
    line($title);
    $i = 0;
    do {
        [$question, $rigthAnswer] = $fnGenQuestion();
        line("Question: {$question}");
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
