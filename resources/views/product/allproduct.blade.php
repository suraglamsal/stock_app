@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="d-flex justify-content-between mb-4">
            <h2>List of All Products</h2>

            <a href="{{ route('product.create') }}" class="btn btn-primary">
                Add Product
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table ">

            <thead class="">
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Power</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>

                @if (count($product) > 0)
                    @foreach ($product as $item)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <img src="{{ asset('storage/' . $item->img) }}" width="100" height="100"
                                    style="object-fit:cover;">
                            </td>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->power }}</td>

                            <td>{{ $item->brand }}</td>

                            <td>Rs. {{ $item->price }}</td>
                            <td><a href="{{ route('product.edit', $item->id) }}"> Edit</a>
                                <form method="post" action="{{ route('product.delete', $item->id) }}"> 
                                    @csrf
                                    @method('DELETE')
                                   <button
                                    type="submit"
                                    class="btn btn-danger">
                                    Delete
                                   </button>
                                   
                                </form>
                            
                            </td>



                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">
                            No Products Found
                        </td>
                    </tr>
                @endif


            </tbody>

        </table>

    </div>


@endsection
