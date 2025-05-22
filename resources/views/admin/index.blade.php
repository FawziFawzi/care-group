<x-admin.layout>

    <x-admin.sidebar />

   <!-- [ Header Topbar ] start -->
    <x-admin.navbar />
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
   <x-admin.main :orders="$orders"/>
    <!-- [ Main Content ] end -->
</x-admin.layout>
