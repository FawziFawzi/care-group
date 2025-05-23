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

            <h3 class="mb-3">Add New PRODUCT</h3>

        <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
                    <div class="col-md-4">
                        <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required type="text" value="{{ old('name') }}">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">PRODUCT CATEGORY</label>
                    <div class="col-md-4">
                        <input id="product_name_fr" name="category" placeholder="PRODUCT Category" class="form-control input-md" required type="text" value="{{ old('category') }}">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">PRODUCT PRICE</label>
                    <div class="col-md-4">
                        <input id="price" name="price" placeholder="Price" class="form-control input-md" required type="text" value="{{ old('price') }}">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">PRODUCT DESCRIPTION</label>
                    <div class="col-md-4">
                        <input id="price" name="description" placeholder="description" class="form-control input-md" required type="text" value="{{ old('description') }}">

                    </div>
                </div>



                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload product photo</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                    </div>

                <button type="submit" class="btn btn-primary">Add Product</button>



                </fieldset>
            </form>
    </div>
</x-admin.layout>
