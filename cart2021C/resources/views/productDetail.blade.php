@extends('layout')
@section('content')
<div class="row">
    @foreach($products as $product)
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <img src="{{asset('image/')}}/{{$product->image}}" alt="" width="100%" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <br><br>
                    <p class="card-text">{{$product->description}}</p>
                    <div class="card-heading">Quantity <input type="number" min="1"
                    max="10" name="quantity"> Available: {{$product->quantity}}</div><br><br>
                    <div class="card-heading">RM {{$product->price}}</div>
                    <button class="btn btn-danger btn-xs" type="submit">Add to Cart</button>
                </div> 
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection