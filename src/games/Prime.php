<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\game;

const MAX_RAND_INT = 100;

function isPrime(int $n): bool
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $title = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $genQuestion = function () {
        $question = random_int(1, MAX_RAND_INT);
        $answer = isPrime($question) ? "yes" : "no";
        return [$question, $answer];
    };
    game($title, $genQuestion);
}
