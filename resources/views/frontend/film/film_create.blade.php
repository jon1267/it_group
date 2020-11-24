<h3>Создание фильма</h3>
<div>
    <form action="{{ route('films.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Название фильма</label><br>
            <input type="text" name="title" id="title" placeholder="Введите название фильма">
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
            <label for="img">Постер фильма (необязательно)</label><br>
            <input type="file" name="img" id="img">
        </div><br>

        <button type="submit">Сохранить</button>
    </form>
</div>
