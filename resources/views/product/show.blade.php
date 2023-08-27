@extends('master')

@section('title', 'Product Details')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Product Details</b></div>
            <div class="col col-md-6 text-right">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Product Name</b></label>
            <div class="col-sm-10">
                {{ $product->name }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Product Description</b></label>
            <p class="col-sm-10">
                {{ $product->description }}
            </p>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Product Price</b></label>
            <div class="col-sm-10">
                {{ $product->price }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Category</b></label>
            <div class="col-sm-10">
                {{ $category->name }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Product Stock Quantity</b></label>
            <div class="col-sm-10">
                {{ $product->stock_quantity }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Is Available</b></label>
            <div class="col-sm-10">
                {{ $product->is_available == 1 ? "True" : "False" }}
            </div>
        </div>

        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Product Image</b></label>
            <div class="col-sm-10">
                <img src="{{ asset('images/' .  $product->image) }}" width="200" class="img-thumbnail" />
            </div>
        </div>
    </div>
</div>

@endsection('content')