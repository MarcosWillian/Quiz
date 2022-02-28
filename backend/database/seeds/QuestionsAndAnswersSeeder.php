<?php

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsAndAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = json_decode(
            file_get_contents(__DIR__. '/data/questions_and_answers_data.json'),
            true
        );

        //dd($questionsData);
        foreach($content['questions'] as $questionData) {
            //dd($questionData);
            $question= Question::create([
                'title' => $questionData['title'],
                'points' => $questionData['points'],
                'observation' => $questionData['observation']
            ]);

            foreach($questionData['answers'] as $answer) {
                Answer::create([
                    'description' => $answer['title'],
                    'correct' => (bool) $answer['correct'],
                    'question_id' => $question->id
                ]);
            }
        }
    }
}
