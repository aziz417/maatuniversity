@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <h3 class="text-center">Learning</h3>

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('math.questions', 1) }}">
                            <div class="single-question mb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="pb-lg-5">
                                            <strong class="pb-lg-3">Lesson 1.1: Adding and Subtraction</strong>
                                            <span class="items-link float-right">
                                            <i class="fa fa-star" style="color: #f8b739"></i>  Computer
                                        </span>
                                        </div>
                                        <p>Quiz:<span class="text-primary"> Mastered</span> <span class="float-right"><i class="fa fa-laptop"> </i> Online</span></p>

                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('math.questions', 2) }}">
                            <div class="single-question mb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="pb-lg-5">
                                            <strong class="pb-lg-3">Lesson 1.2: Addition Computation Through 500</strong>
                                            <span class="items-link float-right">
                                            <i class="fa fa-star " style="color: #f8b739"></i> Computer
                                        </span>
                                        </div>
                                        <p>Quiz:<span class="text-primary"> Mastered</span> <span class="float-right"><i class="fa fa-laptop"> </i> Online</span></p>

                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('math.questions', 3) }}">
                            <div class="single-question mb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="pb-lg-5">
                                            <strong class="pb-lg-3">Lesson 1.3: Finding Diffenence</strong>
                                            <span class="items-link float-right">
                                            <i class="fa fa-star" style="color: #f8b739"></i>  Computer
                                        </span>
                                        </div>
                                        <p>Quiz:<span class="text-primary"> Mastered</span> <span class="float-right"><i class="fa fa-laptop"> </i> Online</span></p>

                                    </div>
                                </div>
                            </div>
                        </a>
                        <span class="float-right">{{--{{ $options->links() }}--}}</span>
                    </div>
                </div>

    </div>
@endsection
@push('script')

@endpush
