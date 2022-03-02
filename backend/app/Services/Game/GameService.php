<?php

namespace App\Services\Game;

use App\Repositories\Answer\AnswerRepositoryContract;
use App\Repositories\Question\QuestionRepositoryContract;
use App\Repositories\Ranking\RankingRepositoryContract;
use Illuminate\Support\Collection;

class GameService 
{
    private QuestionRepositoryContract $questionRepository;
    private AnswerRepositoryContract $answerRepository;

    public function __construct(
        QuestionRepositoryContract $questionRepositoryContract,
        AnswerRepositoryContract $answerRepositoryContract,
        RankingRepositoryContract $rankingRepositoryContract
    )
    {
        $this->questionRepository = $questionRepositoryContract;
        $this->answerRepository = $answerRepositoryContract;
        $this->rankingRepository = $rankingRepositoryContract;
    }

    public function getQuestions(): Collection
    {
        return $this->questionRepository->getAllSorted();
    }

    public function checkAnswers(array $answers): array
    {
        $score = $this->answerRepository->getCorrectAnswersAndTotalPoints($answers);
        if (isset($score['error'])) {
            return ['error', $score['error']];
        }

        if (!$this->rankingRepository->checkIfHasAnyUserInRanking()) {
            $score['noRanking'] = true;
        }

        $score['position'] = $this->rankingRepository->getPositionByScore($score);

        return $score;
    }
}