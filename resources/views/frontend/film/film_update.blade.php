<h3>Обновление фильма</h3>
<div>
    <form action="{{ route('films.update', $film) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Название фильма</label><br>
            <input type="text" name="title" id="title" value="{{ $film->title }}">
        </div><br>
        <div>
            <label for="title">Жанр фильма (испльзуйте Ctrl+Click) </label><br>
            <select multiple id="category" name="category[]" size="5">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div><br>
        <div>

            @if(!is_null($film->img))
                <div>
                    <p>Старый постер</p>
                    <img src="{{ asset('img/'. $film->img) }}" width="80px" alt="film-poster"><br>
                </div>
            @endif
            <label for="img">Новый постер (необязательно)</label><br>
            <input type="file" name="img" id="img">
        </div><br>

        <button type="submit">Обновить</button>
    </form>
</div>
