@extends('master')

@section('title', 'Category Details')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Category Details</b></div>
            <div class="col col-md-6 text-right">
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Category Name</b></label>
            <div class="col-sm-10">
                {{ $category->name }}
            </div>
        </div>
    </div>
</div>

@endsection('content')