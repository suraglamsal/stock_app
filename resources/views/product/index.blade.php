@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-between mb-4">
        <h2>Number of all products currently in stock</h2>

        <div class="m-1">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                Add Product

            </a>
        </div>
        <div class="m-1">
            <a href="{{ route('product.allproduct') }}" class="btn btn-primary"> List of all products </a>

        </div>
    </div>


    <div class="container-fluid">
        <div class="row g-3">
            @foreach ($product as $products)
                <div class=" col-lg-3 col-md-4 col-sm-6 ">
                    <div class="card-header rounded-4 overflow-hidden product-card text-center">
                        <h5>{{ $products->name }}</h5>
                    </div>
                    <div class="card-body text-center">
                        <img class="card-img-top" src="{{ asset('storage/' . $products->img) }}" alt="Title"
                            width="200px" height= "200px" object-fit= "cover" object-position="center" />
                        <h5 class="card-title">{{ $products->power }} | {{ $products->brand }} </h5>
                        <h4 class="card-text">Rs.{{ $products->price }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>
@endsection
