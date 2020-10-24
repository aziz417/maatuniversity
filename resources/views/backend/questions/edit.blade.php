@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="float-right btn btn-success"><i class="fa fa-plus"></i> Create</span></div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('questions.update', $question->slug) }}">
                            @csrf
                            @method('PUT')

                            @include('backend.questions.element')

                           <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
