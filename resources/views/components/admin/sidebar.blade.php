<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <!-- ========   Change your logo from here   ============ -->
            <a href="{{ route('admin.home') }}"><h3 class="mt-1">Care Group</h3></a>
        </div>

        <div class="navbar-content">
            {{--            Side-Bar--}}
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('admin.products.index') }}" class="pc-link">
                        <span class="pc-mtext">All Products</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('admin.products.create') }}" class="pc-link">
                        <span class="pc-mtext">Create New Product</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
