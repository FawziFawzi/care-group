<base href="/public">
<x-layout>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1>Order Confirmation</h1>
            <div class="alert alert-success">Thank you for your order!</div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Order #{{ $order->order_number }}</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Customer Information</h5>
                        <p>
                            {{ $order->name }}<br>
                            Phone: {{ $order->phone }}<br>


                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5>Delivery Address</h5>
                        <p>{{ $order->address }}</p>
                    </div>
                </div>

                <h5>Order Items</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->order_items as $item)
                        <tr>
                            <td>{{ $item['product_name'] }}</td>
                            <td>${{ number_format($item['product_price'], 2) }}</td>
                            <td>{{ $item['product_quantity'] }}</td>
                            <td>${{ number_format($item['product_total_price'], 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>${{ number_format($order->total_price, 2) }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>

</x-layout>
