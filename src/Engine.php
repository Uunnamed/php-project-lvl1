<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ATTEMPTS = 3;


function game(string $decription, callable $fnGenQuestion): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($decription);
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
    } while ($i < NUMBER_ATTEMPTS);
    $result = ($i == NUMBER_ATTEMPTS)
            ? "Congratulations, {$name}!"
            : "Let's try again, {$name}!";
    line($result);
}
