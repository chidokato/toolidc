@if ($errors->any())
    <div class="alert alert-danger" id="hidden">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('error'))
    <div class="alert alert-danger" id="hidden">
        {{ Session::get('error') }}
    </div>
@endif


@if (Session::has('success'))
    <div class="alert alert-success" id="hidden">
        {{ Session::get('success') }}
    </div>
@endif
