<?php

namespace App\Repositories\Question;

use App\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository implements QuestionRepositoryContract
{
    private Question $questionModel;

    public function __construct()
    {
        $this->questionModel = new Question();
    }

    public function getAllSorted(): Collection
    {
        return $this->questionModel
            ->with('answers')
            ->inRandomOrder()
            ->get();
    }
}