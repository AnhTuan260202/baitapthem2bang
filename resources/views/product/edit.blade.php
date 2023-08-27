@extends('master')

@section('title', 'Edit Product')

@section('content')

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <div class="card">
        <div class="card-header">Edit Product</div>
        <div class="card-body">
            <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" min="0" step="0.1" class="form-control"
                            value="{{ $product->price }}" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                @if ($category->id == $product->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Stock Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" name="stock_quantity" class="form-control" value="1" value="{{ $product->stock_quantity }}"/>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Is Available</label>
                    <div class="col-sm-10">
                        <select name="is_available" class="form-control">
                            @if ($product->is_available == 1)
                                <option value="1" selected>True</option>
                                <option value="0">False</option>
                            @else
                                <option value="1">True</option>
                                <option value="0" selected>False</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Product Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" />
                        <br />
                        <img src="{{ asset('images/' . $product->image) }}" width="100" class="img-thumbnail" />
                        <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </form>
        </div>
    </div>

@endsection('content')
