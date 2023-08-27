@extends('master')

@section('title', 'Edit Category')

@section('content')

<div class="card">
    <div class="card-header">Edit Category</div>
    <div class="card-body">
        <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Category Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $category->id }}" />
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
</div>

@endsection('content')
