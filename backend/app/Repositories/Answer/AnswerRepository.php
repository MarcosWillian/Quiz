<?php

namespace App\Repositories\Answer;

use App\Helpers\GameHelper;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryContract
{
    private Answer $model;

    public function __construct()
    {
        $this->model = new Answer();
    }

    public function getCorrectAnswersAndTotalPoints(array $answers): array
    {
        if (empty($answers)) {
            return ['error' => 'lista vazia'];
        }

        $result = $this->model
                ->select(DB::raw('count(answers.id) as correct_answers, sum(questions.points) as total_points'))
                ->join('questions', 'questions.id', '=', 'answers.question_id')
                ->whereIn('answers.id', $answers)
                ->where('answers.correct', true)
                ->first()
                ->toArray();

        return GameHelper::removeNullValuesInScoreArray($result);
    }
}