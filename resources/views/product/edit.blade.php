@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h2> Stock keeper Dashboard</h2>
                        <h7>enter Item details</h7>
                    </div>

                    <div class="card-body">
                        <!-- <div class="alert alert-success" role="alert">
                            <h7>Place to keep view elements</h7>
                        </div> -->

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif







                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name of Product</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter full name of Product " value="{{ $product->name }}" />

                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Power of product</label>
                                <input type="text" name="power" id="" class="form-control"
                                    placeholder="Power in watt" value="{{ $product->power }}" />

                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Brand</label>
                                <input type="text" name="brand" id="" class="form-control" placeholder=""
                                    value="{{ $product->brand }}" />

                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="text" name="price" id="" class="form-control"
                                    placeholder="Price of Product in Nrs" value="{{ $product->price }}" />


                            </div>
                            <div class="mb-3 p-3">
                                <div class="container mb-3"> <img src="{{ asset('storage/' . $product->img) }}"
                                        class="img-fluid rounded-top" />



                                        
                                </div>

                                <input type="file" name="img" class="mb-5">
                                <br>
                                <button type="submit"> Update </button>
                            </div>



                        </form>





                    </div>




                </div>

            </div>
        </div>
    </div>


@endsection
