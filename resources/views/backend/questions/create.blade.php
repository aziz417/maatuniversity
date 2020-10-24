@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('questions.index') }}" class="float-right btn btn-success"><i class="fa fa-arrow-circle-left"></i> Back</a></div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('questions.store') }}">
                            @csrf
                            @include('backend.questions.element')
                            <button class="btn btn-success">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
