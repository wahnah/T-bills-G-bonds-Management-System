@if ($errors->any() || $error = Session::get('error'))
    <div class="mb-2 p-3 bg-red-200 text-red-600 rounded" role="alert">
        <ul>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @else
                <li>{{ $error }}</li>
            @endif
        </ul>
    </div>
@endif
