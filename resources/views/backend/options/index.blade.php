@extends('backend.layouts.app')
@section('content')
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('options.create') }}" class="float-right btn btn-success"><i class="fa fa-plus"></i> Create</a></div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Option</th>
                                <th scope="col">Created By</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $key=>$option)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ ucfirst(@$option->option) }}</td>

                                <td>{{ ucfirst(@$option->createdUser->name) }}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <span class="float-right">{{ $options->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
