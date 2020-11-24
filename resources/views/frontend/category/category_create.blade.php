<h3>Создание категории</h3>
<div>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <input type="text" name="title" id="title" placeholder="Введите категорию фильма">
        <button type="submit">Сохранить</button>
    </form>
</div>
