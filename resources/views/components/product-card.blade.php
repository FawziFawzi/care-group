@props(['product'])
    <div class="col mb-5 ">
        <div class="card h-100 hoverDiv">
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                    <!-- Product price-->
                    ${{ $product->price }}
                </div>
            </div>
                    <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent ">
                <div class="text-center">
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-outline-dark mt-auto">Add to Cart</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

