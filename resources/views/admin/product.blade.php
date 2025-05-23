<x-admin.layout>
    <div class="container product-container">
        <div class="row">
            <!-- Product Image Column -->
            <div class="col-md-4">
                <img src="{{  asset('/storage/'.$product->image) }}" alt="Product Image" class="product-image">
            </div>

            <!-- Product Details Column -->
            <div class="col-md-8 product-details">
                <h1 class="product-title">{{ $product->name }}</h1>
                <div class="product-price">${{ $product->price }}</div>
                <span class="product-category">{{ $product->category }}</span>
                <p class="product-description">{{ $product->description }}</p>


                <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-warning">Edit</a>
            </div>

        </div>
    </div>
</x-admin.layout>
