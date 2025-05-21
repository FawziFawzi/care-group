@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false,4000)"
         x-show="show"
         class="bg-primary position-fixed bottom-0 end-0 p-2 rounded-3 text-white fs-6 m-3 "
         >

        <p>{{ session('success') }}</p>
    </div>
@endif
