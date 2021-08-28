<?php

namespace Brain\Games\Calc;

use Exception;

use function Brain\Games\Engine\game;

const MAX_INT_NUM_1 = 199;
const MIN_INT_NUM_1 = -199;
const MAX_INT_NUM_2 = 20;
const MIN_INT_NUM_2 = 0;

function calc(string $operator, int $num1, int $num2): int
{
    switch ($operator) {
        case '*':
            return $num1 * $num2;
        case '-':
            return $num1 - $num2;
        case '+':
            return $num1 + $num2;
        default:
            throw new Exception("Undefined operation `{$operator}`");
    }
}

function run(): void
{
    $decription = 'What is the result of the expression?';
    $genQuestion = function (): array {
        $operations = ['*', '-', '+'];
        $operator = $operations[random_int(0, count($operations) - 1)];
        $num1 = random_int(MIN_INT_NUM_1, MAX_INT_NUM_1);
        $num2 = random_int(MIN_INT_NUM_2, MAX_INT_NUM_2);
        $question = "{$num1} {$operator} {$num2}";
        $answer = calc($operator, $num1, $num2);
        return [$question, $answer];
    };
    game($decription, $genQuestion);
}
