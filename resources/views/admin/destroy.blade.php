<h1>Excluir Livro</h1>

<p>Tem certeza que deseja excluir o livro <strong>{{ $book->title }}</strong>?</p>

<form method="POST" action="{{ route('books.destroy', $book->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>

<a href="{{ route('books.index') }}">Cancelar</a>
