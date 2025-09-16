<h1>Excluir Gênero</h1>

<p>Tem certeza que deseja excluir o gênero <strong>{{ $gender->name }}</strong>?</p>

<form method="POST" action="{{ route('genders.destroy', $gender->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>

<a href="{{ route('genders.index') }}">Cancelar</a>
