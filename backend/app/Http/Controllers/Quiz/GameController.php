<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Services\Game\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function begin()
    {
        $questions = $this->gameService->getQuestions();

        return response()->json($questions, JsonResponse::HTTP_OK);
    }

    public function finish(Request $request)
    {
        $answers = json_decode($request->answers);

        $score = $this->gameService->checkAnswers($answers);

        if (isset($score['error'])) {
            return response()->json(['error' => $score['error']], JsonResponse::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json($score, JsonResponse::HTTP_OK);
    }
}
