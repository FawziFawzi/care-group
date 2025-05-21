<x-layout>
    <div class="cart-container">
        <h1 class="mb-4 text-center">Shopping Cart</h1>
        <div class="card">
            <div class="card-body">
                @if(Cart::count() == 0)
                    <h3 class="text-center">No items in cart</h3>
                @else
                <table class="table cart-table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="cart-items">

                        @foreach(Cart::content() as $item)
                            <tr data-id="{{ $item->rowId }}">
                                <td>{{ $item->model->name }}</td>
                                <td class="price">${{ $item->model->price }}</td>

{{--                                Change quantity of the order--}}
                                <td>
                                    <select class="quantity form-select" data-id="{{ $item->rowId }}" name="quantity">
                                        @for($i =1; $i < 6;$i++)
                                            <option {{ $item->qty == $i ? 'selected' :'' }}>{{ $i }}</option>
                                        @endfor

                                    </select>
                                </td>
{{--                                Remove Product button--}}
                                <td>
                                    <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm remove-item">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="text-end">Total:</td>
                        <td class="cart-total" id="cart-total">${{ Cart::subTotal() }}</td>
                    </tr>
                    </tfoot>
                </table>

                <div class="text-end">
                    <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    @section('extra-js')
{{--         When the quantity changes update the cart--}}
        <script>
            (function () {
                const classname = document.querySelectorAll('.quantity')

                Array.from(classname).forEach(function (element) {
                    const id = element.getAttribute('data-id')
                    element.addEventListener('change',function () {
                        axios.patch(`/cart/${id}`, {
                            quantity: this.value,
                        })
                            .then(function (response) {
                                window.location.href = '{{ route('cart.index') }}'
                            })
                            .catch(function (error) {
                                window.location.href = '{{ route('cart.index') }}'
                            });
                    })
                })
            })();
        </script>
    @endsection
</x-layout>
