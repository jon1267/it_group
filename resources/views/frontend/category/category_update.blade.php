<h3>Редактирование категории</h3>
<div>
    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="title" value="{{ $category->title }}" >
        <button type="submit">Обновить</button>
    </form>
</div>
