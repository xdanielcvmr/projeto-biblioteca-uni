<h1>Editar Gênero</h1>

<form method="POST" action="{{ route('genders.update', $gender->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $gender->name) }}" required>

    <button type="submit">Salvar</button>
</form>