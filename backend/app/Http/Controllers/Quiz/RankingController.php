<?php

namespace App\Http\Controllers;

use App\Services\Game\GameService;

class RankingController extends Controller
{
    private GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index()
    {
        //
    }
}
