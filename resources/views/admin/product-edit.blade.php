<x-admin.layout>
    <div class="container py-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3 class="mb-3">EDIT PRODUCT</h3>


        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="product_name">PRODUCT NAME</label>
                            <div class="col-md-6">
                                <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control"  type="text" value="{{ $product->name }}" required>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="product_name_fr">PRODUCT CATEGORY</label>
                            <div class="col-md-6">
                                <input id="product_name_fr" name="category" placeholder="PRODUCT Category" class="form-control"  type="text" value="{{ $product->category }}">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="available_quantity">PRODUCT PRICE</label>
                            <div class="col-md-6">
                                <input id="price" name="price" placeholder="Price" class="form-control "  type="text" value="{{ $product->price }}"required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="available_quantity">PRODUCT DESCRIPTION</label>
                            <div class="col-md-6">
                                <input id="price" name="description" placeholder="description" class="form-control "  type="text" value="{{ $product->description }}" required>

                            </div>
                        </div>



                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label">Upload product photo</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>



                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
