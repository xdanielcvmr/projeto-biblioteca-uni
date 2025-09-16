<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Sora:wght@100..800&display=swap');

    body {
        margin: 0;
        background: #f4f6fb;
    }

    /* CSS do cabeçalho */
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #fff;
      color: white;
      padding: 10px 20px;
    }

    .logo img {
      height: 40px;
    }

    nav {
      
      text-align: center;
    }

    nav a {
      margin: 0 15px;
      text-decoration: none;
      color: #000;
      font-size: 20px;
      font-family: Sora;
      transition: color 0.5s;
    }

    nav a:hover {
      color: #ADD8E6;
    }

    .fundo img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        object-position: center;
        opacity: 30%;
    }

    .edit {
        background: #add8e6;
        padding: 20px;
        text-align: center;
        font-family: Sora;
        color: #002835ff;
    }

    .forms {
        background: white;
        margin: 20px 800px;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 6px 12px #707070;
        font-family: Sora;
        font-size: 15px;
    }

    .box {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }

    .box label {
        font-weight: bold;
        margin-bottom: 6px;
        font-family: Sora;
    }

    .box input {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-family: Sora;
    }
    
    .box select {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-family: Sora;
    }

    .buttons {
        text-align: center;
        display:flex;
        justify-content: space-between;
    }

    .buttons button {
        border: 0;
        background: white;
        font-family: Sora;
        font-size: 20px;
        font-weight: 500;
        transition: 0.3s;
    }

    .buttons button:hover {
        color: #add8e6;
    }

    .buttons a {
        text-decoration: none;
        font-family: Sora;
        font-size: 20px;
        font-weight: 500;
        transition: 0.3s;
        color: #000;
    }

    .buttons a:hover {
        color: #add8e6;
    }

</style>

<body>

                                    {{-- Cabeçalho --}}

<header>
    <div class="logo">
      <img src="{{ asset('images/logob.jpg') }}" alt="Logotipo">
    </div>

    <nav>
      <a href="{{ route('books.index') }}">Home</a>
      <a href="{{ route('genders.index') }}">Gênero</a>
    </nav>
</header>

                                    {{-- Introdução --}}

<div class="edit">
    <h1>Editar Livro</h1>
</div>

                                    {{-- Formulario --}}

<form class="forms" method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Titulo !-->
    <div class="box">
        <label for="title">Titulo:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
    </div>

    <!-- Autor !-->
    <div class="box">
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>
    </div>
    
    <!-- Ano !-->
    <div class="box">
        <label for="year">Ano:</label>
        <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" required>
    </div>
    
    <!-- Genero !-->
    <div class="box">
        <label for="gender_id">Gênero:</label>
        <select name="gender_id" id="gender_id" required>
            <option value="">Selecione um gênero</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}"
                    {{ old('gender_id', $book->gender_id) == $gender->id ? 'selected' : '' }}>
                    {{ $gender->name }}
                </option>
            @endforeach
    </select>
    </div>

    <!-- Capa !-->
    <div class="box">
        <label>Capa (imagem)</label>
        <input type="file" name="capa">
    </div>

    <div class="buttons">
        <button type="submit">Salvar</button>
        <a href="{{ route('books.index') }}">Voltar</a>
    </div>

</form>

</body>