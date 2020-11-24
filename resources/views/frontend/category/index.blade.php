{{--@section('content')--}}
    <h3>Категории фильмов</h3>
    <div>
        @foreach($categories as $category)
            <p>{{ $category->id }} | {{ $category->title }}</p>
        @endforeach
    </div>
{{--@endsection--}}
