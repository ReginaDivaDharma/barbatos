@extends('navbar')

@section('title', 'Home')

@section('content')
    <div style="margin: 50px 100px">
        <h2> <strong class="d-flex justify-content-center">Products</strong> </h2>

        <form action="/">
            <input type="text" placeholder="Search Product..." id="search" name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <a href="{{url("index")}}" class="">View All</a>

    @if($products->contains('categories_id','1'))
        <h2>Food</h2>
        <div style="margin-top: 50px">
        <div class="row" style="justify-content:space-evenly">
        @foreach ($products as $product)
            <div class="card" style="width: 18rem;margin-top:25px">
                 <img class="card-img-top" src="{{ asset('/storage/image/' . $product->image) }}" alt="Product Image" width="100" height="100">
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
    @endif

    @if($products->contains('categories_id','2'))
        <h2>Beauty</h2>
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
    @endif

    @if($products->contains('categories_id','3'))
    <h2>Technology</h2>
    <div style="margin-top: 50px">
    <div class="row" style="justify-content:space-evenly">
    @foreach ($products as $product)
        <div class="card" style="width: 18rem;margin-top:25px">
             <img class="img-responsive" src="{{ asset('/storage/image/' . $product->image) }}" alt="Product Image" width="100" height="100">
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
@endif

@endsection