@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <h3 class="text-center">Study Now</h3>

        <div class="card">
            <span class="text-success message" style="display: none"></span>
            <div class="card-body">
                @foreach($questions as $key=>$question)
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
                @endforeach
                     @php $lesson_id = Session::get('lesson_id') @endphp
                    <a class="btn btn-warning float-right" href="{{ route('summery.index', $lesson_id) }}">Your study summary </a>

              </div>
        </div>

    </div>
@endsection
@push('script')
    <script>

        function correctAnswer(e){
            var data = e;
            var id = '#option-'+e;
            $(id).removeClass('btn-warning')
            $(id).addClass('btn-success')
            $(id).closest("div").css({"pointer-events": "none", "opacity": "0.7"})
            $.get('/dashboard/question/answer/', { data : data }, function (response){
                if (response == 'correct'){
                    $(".message").removeClass('text-danger').addClass('text-success').css('display','block').html('Welcome this answer is correct!');
                    setTimeout(function (){
                        $(".message").css('display', 'none');
                    }, 3000)
                }else{
                    var correctAnsId = '#option-'+response;
                    $(correctAnsId).removeClass('btn-warning').addClass('btn-success');
                    $(id).addClass('btn-danger')
                    $(".message").removeClass('text-success').addClass('text-danger').css('display','block').html('Oops this answer is Wrong!');
                    setTimeout(function (){
                        $(".message").css('display', 'none');
                    }, 3000)
                }
            })
        }

    </script>
@endpush
