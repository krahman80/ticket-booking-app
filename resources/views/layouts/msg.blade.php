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
        <p>{{ session('msg') }}</p>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-info">
        <p>{{ session('success') }}</p>
    </div>
@endif