@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        @foreach ($products as $product)
        <div class="col-sm-6 col-md-3">
            <div class="card mt-3">
              <img src="{{ $product->image }}" class="card-img-top" alt="...">
              <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h3 class="card-title">SGD {{ number_format($product->price) }}</h3>
                    <p class="card-text">{{ $product->description}}</p>
                    <a href="{{ route('items.addToCart', ['id' => $product->id]) }}" class="btn btn-primary">Buy</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
