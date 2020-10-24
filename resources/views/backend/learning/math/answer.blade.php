@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <h3 class="text-center">Study Now</h3>

        <div class="card">
            <span class="text-success message" style="display: none"></span>
            <div class="card-body">
                @forelse($questions as $key=>$question)
                    <div class="single-question mb-30">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="pb-lg-5"><strong>{{ ++$key }}.</strong>
                                    <strong class="pb-lg-3">
                                        <span class="form-control-sm" id="audio-{{ $question->id }}"
                                              onclick="playAudio({{ $question->id }})">
                                            <i id="changeIcon-{{ $question->id }}" class="fa fa-volume-up"></i>
                                        </span>
                                        {{ $question->title }}
                                    </strong>
                                </div>
                                @if($question->image)
                                    <div class="mb-lg-3">
                                        <img width="400px" height="200px" class="img-responsive btn-warning" src="{{ Storage::disk('public')->url('questions/').$question->image }}">
                                    </div>
                                @endif
                                @foreach($question->options as $option)
                                    @if($option->option)
                                        <span class="btn btn-warning" id="option-{{ $option->id }}"
                                              onclick="correctAnswer({{ $option->id }})">{{ ucfirst(@$option->option) }}</span>
                                    @endif
                                    @if($option->optionImage)
                                        <span class="btn btn-warning m-2"
                                              style="border: 2px solid #ffc107!important; padding: 2px!important;"
                                              id="option-{{ $option->id }}" onclick="correctAnswer({{ $option->id }})">
                                            <img width="80px" height="70px" src="{{ Storage::disk('public')->url('options/').$option->optionImage }}">
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-danger text-center">Sorry No Questions</p>
                @endforelse
                    @php $lesson_id = Session::get('lesson_id') @endphp
                    <a class="btn btn-warning float-right" href="{{ route('summery.index', $lesson_id) }}">Your study
                        summary </a>

            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        function playAudio(e) {

            var id = '#audio-' + e;
            /*var changeIcon = '#changeIcon-' + e;
            //console.log($(id).find(i))
            $(changeIcon).removeClass('fa-volume-up');
            $(changeIcon).addClass('fa-play-circle');*/

            var text = $(id).parent().text();

            if ('speechSynthesis' in window) {
                var msg = new SpeechSynthesisUtterance(text);
                window.speechSynthesis.speak(msg);

            }

        }

        function correctAnswer(e) {
            var data = e;
            var id = '#option-' + e;
            $(id).removeClass('btn-warning')
            $(id).addClass('btn-success')
            $(id).closest("div").css({"pointer-events": "none", "opacity": "0.7"})
            $.get('/dashboard/question/answer/', {data: data}, function (response) {
                if (response == 'correct') {
                    $(".message").removeClass('text-danger').addClass('text-success').css('display', 'block').html('Welcome this answer is correct!');
                    setTimeout(function () {
                        $(".message").css('display', 'none');
                    }, 3000)
                } else {
                    var correctAnsId = '#option-' + response;
                    $(correctAnsId).removeClass('btn-warning').addClass('btn-success');
                    $(id).addClass('btn-danger')
                    $(".message").removeClass('text-success').addClass('text-danger').css('display', 'block').html('Oops this answer is Wrong!');
                    setTimeout(function () {
                        $(".message").css('display', 'none');
                    }, 3000)
                }
            })
        }

    </script>
@endpush
