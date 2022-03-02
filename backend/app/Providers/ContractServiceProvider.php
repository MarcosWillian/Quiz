<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Question\QuestionRepositoryContract', 
            'App\Repositories\Question\QuestionRepository'
        );

        $this->app->bind(
            'App\Repositories\Answer\AnswerRepositoryContract', 
            'App\Repositories\Answer\AnswerRepository'
        );

        $this->app->bind(
            'App\Repositories\Ranking\RankingRepositoryContract', 
            'App\Repositories\Ranking\RankingRepository'
        );
    }
}
