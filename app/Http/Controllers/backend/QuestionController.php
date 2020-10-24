<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\CommonController\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('createdUser', 'updatedUser')->paginate(10);
        return view('backend.questions.index', compact('questions'));
    }


    public function create()
    {
        Session::forget('question_id');
        return view('backend.questions.create');
    }


    public function store(QuestionRequest $request)
    {
        $request->status = !$request->status;
        if ($request->img){

            if ($request->hasFile('img')){

                $slug = Str::slug($request->title);
                $image = $request->file('img');
                $image_name = CommonController::fileUploaded(
                    $slug, false, $image, 'questions', ['width' => '200', 'height' => '200']
                );
                $request['image'] = $image_name;
            }
        }

        $onlyGo = $request->only([
            'lesson_id',
            'title',
            'image',
            'slug',
            'status',
            'created_by',
            'updated_by',
        ]);

        $question = Question::create($onlyGo);
        if ($question){
            $question_id = $question->id;
            Session::put('question_id', $question_id);
            Toastr::success('Question create successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('options.create');
        }
    }
    public function statusChange(Question $question)
    {
        $question->status = !$question->status;
        $update = $question->update();
        if ($update){
            Toastr::success('Status change successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }else{
            Toastr::warning('The Identifier is wrong.. please try again', 'Warning', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }


    public function edit(Question $question)
    {
        return view('backend.questions.edit', compact('question'));
    }


    public function update(QuestionRequest $request, Question $question)
    {
        $request->status = !$request->status;
        $onlyGo = $request->only([
            'lesson_id',
            'title',
            'audio',
            'slug',
            'status',
            'created_by',
            'updated_by',
        ]);


        $question = $question->update($onlyGo);
        if ($question){
            Toastr::success('Question update successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('questions.index');
        }
    }


    public function destroy(Question $question)
    {
        $question->delete();

        Toastr::success('Question delete successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
