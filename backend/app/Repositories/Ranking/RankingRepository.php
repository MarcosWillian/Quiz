<?php

namespace App\Repositories\Ranking;

use App\Models\Ranking;

class RankingRepository implements RankingRepositoryContract
{
    private Ranking $model;

    public function __construct()
    {
        $this->model = new Ranking();
    }

    public function getPositionByScore(array $score): int
    {
        $ranking = $this->model
            ->where('total_points', '<=', $score['total_points'])
            ->where('total_answers', '<=', $score['correct_answers'])
            ->first();

        return (int) !empty($ranking) ? $ranking->position : 0;
    }
}