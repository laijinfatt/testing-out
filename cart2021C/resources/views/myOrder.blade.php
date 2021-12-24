@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center; font-weight: bold;">
                    <td>OrderID</td>
                    <td>Order Date & Time</td>
                    <td>Total Amount</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>

@endsection