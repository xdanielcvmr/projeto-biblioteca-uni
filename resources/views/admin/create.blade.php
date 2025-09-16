<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="title">Nome:</label>
    <input id="title" name="title" type="text" required/>
    <br>
    <label for="author">Autor:</label>
    <input type="text" name="author" id="author" required>
    <br>
    <label for="year">Ano</label>
    <input type="text" name="year" id="year" required>
    <br>
    <div class="mb-3">
    <label for="gender_id">Gênero:</label>
    <select name="gender_id" id="gender_id" required>
        <option value="">Selecione um gênero</option>
        @foreach ($genders as $gender)
            <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                {{ $gender->name }}
            </option>
        @endforeach
    </select>
    </div>

    <label>Capa (imagem)</label>
    <input type="file" name="cover" id="cover" />

    <br>
    <input type="submit">
</form>