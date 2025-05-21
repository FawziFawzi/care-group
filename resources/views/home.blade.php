<x-layout>
    <!-- Header-->
    <x-header-panel />


    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if($products->count() == 0 )
                    <p>No Products Here Yet</p>
                @else
                    @foreach($products as $product)
                        <x-product-card :product="$product"/>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Feel Free To Contact us by email.</p></div>
    </footer>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

</x-layout>
