<?php

namespace App\Helpers;

class GameHelper 
{
    public static function removeNullValuesInScoreArray(array &$answerResult): array
    {
        return array_map(
            fn($answer): int => is_null($answer) ? 0 : $answer, 
            $answerResult
        );
    }
}
