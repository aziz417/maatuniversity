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
                                <th scope="col">Status</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Updated By</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $key=>$option)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ ucfirst(@$option->title) }}</td>
                                <td>
                                    <a href="{{ route('status.change', $option->slug) }}">
                                        <span id="status" class="badge  {{ $option->status == 1 ? 'badge-primary' : ' badge-warning' }}">
                                            <strong>  {{ $option->status == 1 ? 'Active' : 'Deactivate' }}</strong>
                                        </span>
                                    </a>
                                </td>
                                <td>{{ ucfirst(@$option->createdUser->name) }}</td>
                                <td>{{ ucfirst(@$option->updatedUser->name) }}</td>
                                <td>
                                    <a href="{{ route('options.edit', $option->slug) }}"
                                       class="btn-sm btn-info">
                                        <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                    </a>

                                    <button type="button" onclick="deleteItem('{{ $option->slug }}')" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> <strong>Delete</strong></button>

                                    <form id="delete-form-{{ $option->slug }}" style="display:none" action="{{ route('options.destroy', $option->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
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
