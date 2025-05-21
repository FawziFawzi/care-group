@if($errors->any())
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false,6000)"
         x-show="show"
         class="bg-danger position-fixed bottom-0 end-0 p-2 rounded-3 text-white fs-6 m-3 "
         >

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
