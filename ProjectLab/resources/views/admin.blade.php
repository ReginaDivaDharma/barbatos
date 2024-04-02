@extends('navbar')

@section('title', 'Admin')

@section('content')

    <style>
        .right {
        float: right;
        }
    </style>

    <div style="margin: 50px 100px">
        <h2> <strong class="d-flex justify-content-center">Products</strong> </h2>

        <form action="/">
            <input type="text" placeholder="Search Product..." id="search" name="search">
            <button type="submit">Search</button>
            <div class="right">
                <button onclick="location.href='/add'" type="button" class="btn btn-primary">Add Product +</button>
            </div>
        </form>

        <div style="margin-top: 50px">
            <div class="row" style="justify-content:space-evenly">
                @foreach ($products as $product)
                    <div class="card" style="width: 18rem;margin-top:25px">
                        <img class="card-img-top" src="{{ asset('/storage/image/' . $product->image) }}" alt="Product Image" width="100" height="100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->detail}}</p>
                            <p class="card-text">${{ $product->price}}</p>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <a href="/update/{{ $product->id }}" style="margin-top: 10px"
                                    class="btn btn-warning btn-block text-center">Update</a>
                            </div>
                            <div class="row">
                                <a href="/delete/{{ $product->id }}" style="margin-top: 10px"
                                    class="btn btn-warning btn-block text-center">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{$products->links()}}
    @endsection