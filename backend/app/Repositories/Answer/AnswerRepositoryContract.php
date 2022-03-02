<?php

namespace App\Repositories\Answer;

interface AnswerRepositoryContract
{
    public function getCorrectAnswersAndTotalPoints(array $answers): array;
}