<html>
    <head>
        <title>Southern Online</title>
    </head>
    <body>
        <h1>Order List</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Payment Status</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->paymentStatus}}</td>
                        <td>RM {{$order->amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>