<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_OF_TRY = 3;


function game(string $title, callable $fnGenQuestion): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($title);
    $i = 0;
    do {
        [$question, $rightAnswer] = $fnGenQuestion();
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer != $rightAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            break;
        }
        line('Correct!');
        $i++;
    } while ($i < COUNT_OF_TRY);
    $result = ($i == COUNT_OF_TRY)
            ? "Congratulations, {$name}!"
            : "Let's try again, {$name}!";
    line($result);
}
