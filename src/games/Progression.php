<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\game;

const MIN_ELEMETS_PROGRESSION = 5;
const MAX_ELEMETS_PROGRESSION = 10;
const MAX_OFFSET = 15;


function getRandArithmeticProgression(
    $min = MIN_ELEMETS_PROGRESSION,
    $max = MAX_ELEMETS_PROGRESSION
): array {
    $randOffset = random_int(0, MAX_OFFSET);
    $progression = [$randOffset];
    $cnt = random_int($min, $max);
    for ($i = 1; $i <= $cnt; $i++) {
        $progression[] = $progression[$i - 1] + $randOffset;
    }
    return $progression;
}

function run(): void
{
    $title = 'What number is missing in the progression?';
    $genQuestion = function () {
        $progression = getRandArithmeticProgression();
         $i = random_int(0, count($progression));
         $answer = $progression[$i];
         $progression[$i] = '..';
         $question = implode(', ', $progression);
         return [$question, $answer];
    };
    game($title, $genQuestion);
}
