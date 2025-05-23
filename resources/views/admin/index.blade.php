<x-admin.layout>




    <!-- [ Main Content ] start -->

    <h5 class="mb-3">Recent Orders</h5>
    <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless " style="border-collapse: separate; border-spacing: 0 10px;">
                    <thead>
                    @if($orders->count() == 0)
                        <h5>No Orders Added Yet!</h5>
                    @else
                        <tr>
                            <th>Order NO.</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER PHONE</th>
                            <th>CUSTOMER ADDRESS</th>
                            <th>ORDER DETAILS</th>
                            <th class="text-end">ORDER TOTAL PRICE</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td class="text-start p-0">
                                <ul class="ph-list-checks m-0" >
                                    @foreach($order->order_items as $item)
                                        <li>
                                            {{ $item['product_name'] }}
                                        </li>
                                    @endforeach
                                </ul>

                            </td>

                            <td class="text-end">${{ $order->total_price }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</x-admin.layout>
