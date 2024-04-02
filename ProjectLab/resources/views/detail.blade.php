@extends('navbar')

@section('title','details')

@section ('content')
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset('/storage/image/' . $products->image) }}" alt="Product Image">>
    <div class="card-body">
      <h5 class="card-title">{{ $products->name}}</h5>
      <p class="card-text">{{ $products->detail}}</p>
      <p class="card-text">${{ $products->price}}</p>
    </div>
  </div>
@endsection
