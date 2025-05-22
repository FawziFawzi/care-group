<x-layout>
    <div class="container">
        <div class="row">
            @if($errors->any())
                <dev class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </dev>
            @endif
            <div class="col-md-6 offset-md-2">
                <form action="{{ route('checkout.store') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name"  placeholder="Enter your full name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="address">Delivery Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Delivery Address" value="{{ old('address') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-layout>
