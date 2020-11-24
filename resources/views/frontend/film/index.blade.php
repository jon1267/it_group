{{--@section('content')--}}
<h3>Фильмы</h3>
<div>
    @foreach($films as $film)
        <p>{{ $film->id }} | {{ $film->title }}| {{ $film->publish }}</p>
    @endforeach
</div>
{{--@endsection--}}
