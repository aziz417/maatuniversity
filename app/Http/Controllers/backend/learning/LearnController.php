<?php

namespace App\Http\Controllers\backend\learning;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LearnController extends Controller
{
    public function allQuestion()
    {
        $lessons = [
            'Lesson 1.1: Adding and Subtraction',
            'Lesson 1.2: Addition Computation Through 500',
            'Lesson 1.3: Finding Difference',
        ];
        return view('backend.learning.math.question', compact('lessons'));
    }

    public function mathQuestion($id)
    {
        Session::forget('lesson_id');
        $questions = Question::with(['options' => function ($q) {
            $q->inRandomOrder();
        }])->active()->where('lesson_id', $id)
            ->inRandomOrder()->limit(10)->get();
        Session::put('lesson_id', $id);

        return view('backend.learning.math.answer', compact('questions'));
    }

    public function questionAnswer(Request $request)
    {
        $id = $request->data;
        $answer = Option::where('id', $id)->first();
        $lesson_id = Session::get('lesson_id');


        if ($answer->answer === 1) {
            $answerInfo = [
                'option_id' => $id,
                'lesson_id' => $lesson_id,
                'user_id' => Auth::id(),
                'question_id' => $answer->question_id,
                'correct_answer' => 1,
                'false_answer' => 0,
            ];
            info($answerInfo);
            Answer::create($answerInfo);
            return 'correct';
        } else {
            $answerInfo = [
                'option_id' => $id,
                'user_id' => Auth::id(),
                'lesson_id' => $lesson_id,
                'question_id' => $answer->question_id,
                'correct_answer' => 0,
                'false_answer' => 1,
            ];
            Answer::create($answerInfo);
            $getQuestionId = Option::where('id', $id)->first();
            $question = Question::where('id', $getQuestionId->question_id)->first();
            $correctAns = Option::where('question_id', $question->id)
                ->where('answer', 1)->pluck('id')->first();

            return $correctAns;
        }
    }

    public function summary($lesson_id)
    {
        Session::forget('lesson_id');

        $summary = Answer::where('lesson_id', $lesson_id)->where('user_id', Auth::id())->get();

        $correct_ans = [];
        $false_ans = [];

        foreach ($summary as $item) {
            $item->correct_answer ? $correct_ans[] = $item : $false_ans[] = $item;
        }

        return view('backend.learning.math.summery',
            compact('summary', 'false_ans', 'correct_ans'));
    }
}
