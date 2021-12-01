@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (session('msg'))
    <div class="alert alert-warning">
        <ul>
            <p>{{ session('msg') }}</p>
        </ul>
    </div>
@endif