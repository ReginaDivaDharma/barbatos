@extends('navbar')

@section('title', 'Update')

@section('content')
    <div class="form-container" style="height: 85vh">
        <h1>Update Product</h1>
        <form action="/update/{{ $products->id }}" method="POST" style="margin-top: 20px; width:100%"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;margin-top:20px;">Product Name</label>
                <input type="text" value="{{ $products->name }}" name="product_name" style="width: 100%">
            </div>
            
            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Product Description</label>
                <textarea name="product_detail" cols="66" rows="5"></textarea>
            </div>

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Product Price</label>
                <textarea name="product_price" cols="66" rows="5"></textarea>
            </div>

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Product Image</label>
                <input type="file" name="product_image">
            </div>

            <button type="submit" style="margin-top: 30px">Update</button>

            @if ($errors->any())
            @endif
        </form>
    </div>
@endsection
