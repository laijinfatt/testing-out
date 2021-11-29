@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>ID</td>
                    <td>Product Name</td>
                    <td>Product Description</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Product Image</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thread>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{ asset('image/' . $product->image)}}" width="100" class="img-fluid" alt=""/></td>
                    <td>{{$product->cName}}</td>
                    <td><a href="{{route('editProduct',['id'=>$product->id])}}" class="btn btn-warning btn-xs">Edit</a> <a href="{{ route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection