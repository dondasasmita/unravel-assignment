@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-12 col-md-8">
    @if(Session::has('cart'))
    <div class="row ">
        <table class="table table-bordered responsive">
          <thead>
            <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
          </tr>
      </thead>
      <tbody>
           @foreach($products as $product)
           <tr>
              <td>{{ $product['item']['name'] }}</td>
              <td>{{ $product['qty'] }}</td>
              <td>{{ number_format($product['price']) }}</td>
          </tr>
          @endforeach 
        </tbody>
    </table>
    </div>
    <div class="row">
        <h5>Total : {{ number_format($total_price)}} </h5>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Pay with Stripe</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('cart.clear') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    @else

    @endif
      </div>
</div>
@endsection