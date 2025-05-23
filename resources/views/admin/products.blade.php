<x-admin.layout>
                    <h5 class="mb-3">All Products</h5>
                    <div class="card tbl-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless " style="border-collapse: separate; border-spacing: 0 10px;">
                                    <thead>
                                    @if($products->count() == 0)
                                        <h5>No Products Added Yet!</h5>
                                    @else
                                        <tr>
                                            <th>PRODUCT NAME</th>
                                            <th>PRODUCT DESCRIPTION</th>
                                            <th>PRODUCT PRICE</th>
                                            <th>PRODUCT CATEGORY</th>
                                            <th>VIEW</th>
                                            <th>EDIT</th>
                                            <th class="text-end">DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td><a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">VIEW</a></td>
                                            <td><a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-warning">Edit</a></td>
                                            <td class="text-end">
                                                <form class="d-flex" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $products->links() }}
</x-admin.layout>

