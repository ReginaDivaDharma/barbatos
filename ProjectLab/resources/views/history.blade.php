@extends('navbar')
@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>

    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $detail)
                @php $total += $detail['price'] * $detail['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $detail['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $detail['name'] }}</h4>
                            </div>
                        </div>
                    </td>

                    <td data-th="Price">${{ $detail['price'] }}</td>
                    <td data-th="Quantity">{{ $detail['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $detail['price'] * $detail['quantity'] }}</td>
                    <td data-th="Total" class="text-center">Total = ${{$total}}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection