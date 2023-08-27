@extends('master')

@section('title', 'Create Product')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

    @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Add Product</div>
    <div class="card-body">
        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Product Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Product Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" min="0" step="0.1" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Product Stock Quantity</label>
                <div class="col-sm-10">
                    <input type="number" min="0" name="stock_quantity" class="form-control" value="1" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Is Available</label>
                <div class="col-sm-10">
                    <select name="is_available" class="form-control">
                        <option value="1" selected>True</option>
                        <option value="0">False</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Product Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>

@endsection('content')
