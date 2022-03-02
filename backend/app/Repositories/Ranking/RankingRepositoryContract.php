<?php

namespace App\Repositories\Ranking;

interface RankingRepositoryContract 
{
    public function getPositionByScore(array $score): int;
}