@if(session()->has('success'))
    <div class="card bg-success border-0 shadow">
        <div class="card-body text-white">
            {{ session('success') }}
        </div>
    </div>
@endif
