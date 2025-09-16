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

/* CSS detalhes do livro */

    .details {
        background: #add8e6;
        padding: 20px;
        text-align: center;
        font-family: Sora;
        color: #002835ff;
    }

    .cards {
        background: white;
        margin: 20px 800px;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 6px 12px #707070;
        font-family: Sora;
        font-size: 15px;

    }

    .cards p {
        margin-bottom: 20px;
    }

    

    #excluir:hover {
        color: red;
    }

</style>

<body>


                                    {{-- Cabeçalho --}}

<header>
    <!-- Logotipo -->
    <div class="logo">
      <img src="{{ asset('images/logob.jpg') }}" alt="Logotipo">
    </div>

    <!-- Links centralizados -->
    <nav>
      <a href="{{ route('books.index') }}">Home</a>
      <a href="{{ route('genders.index') }}">Gênero</a>
    </nav>
</header>

                                {{-- Introdução --}}

<div class="details">
<h1>Detalhes do Livro</h1>
</div>

                                {{-- Informações --}}

<div class ="cards">

    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Título:</strong> {{ $book->title }}</p>
    <p><strong>Autor:</strong> {{ $book->author }}</p>
    <p><strong>Ano:</strong> {{ $book->year }}</p>
@if($book->gender)
    <p><strong>Gênero:</strong> {{ $book->gender->name }}</p>
@else
    <p><strong>Gênero:</strong> Não informado</p>
@endif

<nav>
    <a href="{{ route('books.edit', $book->id) }}">Editar</a>
    <a id="excluir" href="{{ route('books.destroy.view', $book->id) }}">Excluir</a>
    <a href="{{ route('books.index') }}">Voltar</a>
</nav>

</div>

</body>