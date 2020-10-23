<?php

namespace App\Http\Controllers\backend\learning;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class LearnController extends Controller
{
 public function allQuestion(){
     return view('backend.learning.math.question');
 }

 public function mathQuestion($id){
     $question = Question::active()->where('lesson_id', $id)->get();
     dd($question);
     return view('backend.learning.math.question');
 }
}
