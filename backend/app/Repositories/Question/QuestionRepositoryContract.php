<?php

namespace App\Repositories\Question;

use Illuminate\Support\Collection;

interface QuestionRepositoryContract 
{
    public function getAllSorted(): Collection;
}