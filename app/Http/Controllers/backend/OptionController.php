<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\CommonController\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;


use function GuzzleHttp\Promise\all;

class OptionController extends Controller
{

    public function index()
    {
        $options = Option::with('createdUser', 'updatedUser')->paginate(10);
        return view('backend.options.index', compact('options'));
    }


    public function create()
    {
        return view('backend.options.create');
    }


    public function store(OptionRequest $request)
    {

       if ($request->image){

           if ($request->hasFile('image')){

               $slug = Str::slug('maat university option image');
               $image = $request->file('image');
               $image_name = CommonController::fileUploaded(
                   $slug, false, $image, 'options', ['width' => '200', 'height' => '200']
               );
               $request['optionImage'] = $image_name;
           }
       }
        $request['question_id'] = Session::get('question_id');
        $option = Option::create($request->all());
        if ($option){
            Toastr::success('Option create successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }


    public function edit(Question $question)
    {
        return view('backend.option.edit', compact('question'));
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
            return redirect()->route('option.index');
        }
    }


    public function destroy(Question $question)
    {
        $question->delete();

        Toastr::success('Question delete successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
