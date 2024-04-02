@extends('navbar')

@section('title', 'add')

@section('content')
    <div class="form-container" style="height: 85vh">
        <h1>Add Product</h1>
        <form action="/add" method="POST" style="margin-top: 20px; width:100%" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;margin-top:20px;">Name</label>
                <input type="text" name="product_name" style="width: 100%">
            </div>

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Category</label>
                <select name="product_category" id="product_category">
                    @foreach ($categories as $categories)
                        <option value="{{$categories->name}}">{{$categories->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Detail</label>
                <textarea name="product_detail" cols="66" rows="5"></textarea>
            </div>  

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Price</label>
                <textarea name="product_price" cols="66" rows="5"></textarea>
            </div>

            <div class="update-menu">
                <label for="" style="display:block; margin-bottom:5px;">Photo</label>
                <input type="file" name="product_image">
            </div>

            <button type="submit" style="margin-top: 30px">Add</button>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
