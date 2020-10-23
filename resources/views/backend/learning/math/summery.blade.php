@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <h3 class="text-center">Summery</h3>

        <div class="card">
            <div class="card-body">
                <label>Correct Answers</label>
                <span class="btn-success btn">{{ count($correct_ans) }}</span>
                <label>Wrong Answers</label>
                <span class="btn-warning btn">{{ count($false_ans) }}</span>
                {{--@foreach($questions as $key=>$question)
                    <div class="single-question mb-30">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="pb-lg-5">
                                    <strong class="pb-lg-3">{{ ++$key }}. {{ $question->title }}</strong>
                                </div>
                                @foreach($question->options as $option)
                                    @if($option->option)
                                        <span class="btn btn-warning" id="option-{{ $option->id }}" onclick="correctAnswer({{ $option->id }})">{{ ucfirst(@$option->option) }}</span>
                                    @endif
                                    @if($option->optionImage)
                                        <span class="btn btn-warning mx-2" style="border: 2px solid #ffc107!important; padding: 2px!important;" id="option-{{ $option->id }}" onclick="correctAnswer({{ $option->id }})">
                                            <img src="{{ Storage::disk('public')->url('options/').$option->optionImage }}">
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach--}}
            </div>
        </div>

    </div>
@endsection