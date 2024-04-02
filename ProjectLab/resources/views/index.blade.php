@extends('navbar')

@section('title', 'Home')

@section('content')
    <div style="margin: 50px 100px">
        <h2> <strong class="d-flex justify-content-center">Products</strong> </h2>

        <form action="/">
            <input type="text" placeholder="Search Product..." id="search" name="search">
            <button type="submit">Search</button>
        </form>

        
        <div style="margin-top: 50px">
            <div class="row" style="justify-content:space-evenly">
                @foreach ($products as $product)
                    <div class="card" style="width: 18rem;margin-top:25px">
                        <img class="card-img-top" src="{{ asset('/storage/image/' . $product->image) }}" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name}}</h5>
                            <p class="card-text">${{ $product->price}}</p>

                        </div>
                        <div class="row">
                            <p class="btn-holder"><a href="/detail/{{ $product->id }}" class="btn btn-warning btn-block text-center" role="button">Detail</a></p>
                        </div>
                        @if(Auth::user() && Auth::user()->role == "Customer")
                        <div class="row">
                            <p class="btn-holder"><a href="add-to-cart/{{ $product->id }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        {{$products->links()}}
@endsection