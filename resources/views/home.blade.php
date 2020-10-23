@extends('backend.layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="mt-4">Welcome Admin Dahsboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
