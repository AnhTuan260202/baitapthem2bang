@extends('master')

@section('title', 'Categories')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Category Data</b></div>
                <div class="col col-md-6 text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @if (count($data) > 0)

                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                <form method="post" action="{{ route('categories.destroy', $row->id) }}">
                                    <a href="{{ route('categories.show', $row->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('categories.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    {{-- <input type="submit" class="btn btn-danger btn-sm" value="Delete" /> --}}
                                    <a class="btn btn-danger" href="#" data-id={{ $row->id }} data-toggle="modal"
                                        data-target="#{{ $row->id }}">Delete</a>
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="{{ $row->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure delete the category with id: {{ $row->id }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </table>
            {!! $data->links('pagination::bootstrap-5') !!}
        </div>
    </div>

@endsection
