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

/* CSS da área de pesquisa */

.search {
    background: #fefeffff;
    text-align: center;
    padding: 30px;
}

.search p {
    font-family: Sora;
    font-size: 56px;
    font-weight: 475; 
    margin: 5px 0;
    color: #002835ff;

}

#proximo {
    color: rgba(255, 125, 49, 1);
}

.search h2 {
    font-family: Sora;
    color: #002835ff;
    font-weight: 500;
    font-size: 18px;
}

.search form input {
    padding:10px;
    width: 25%;
    border: 0px;
    border-radius: 5px;
    font-family: Sora;
    background: #f4f6fb;
}

.search form button {
    color: #002835ff;
    background: #fefeffff;
    font-size: 15px;
    font-weight: bold;
    border: 0px;
    border-radius: 5px;
    font-family: Sora;
    transition: color 1s;
    transition: background-color 1s;
}

.search form button:hover {
    color: #fff;
    background: #002835ff;
}

/* CSS da tabela */

table {
    border-spacing: 5px;
    width: 100%;
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
    font-family: Sora;
}

th {
    background: rgba(255, 125, 49, 1);
    color: white;
    font-family: Bebas Neue;
    letter-spacing: 2px;
    font-size: 20px;
    transition: background-color 0.3s;
}

th:hover {
    background: #add8e6;
}

#action a {
   text-decoration: none;
   color: rgba(255, 125, 49, 1);
   font-weight: 550;
   transition: color 0.3s;
}

.navegation {
    text-align: center;
}

#action a:hover {
    color: #add8e6;
}

/* CSS da paginação */
    .pagination {
        display: flex;        
        list-style: none;     
        padding-left: 0;      
    }

    .pagination li {
        margin: 0 5px;
    }

    .navegation {
        display: flex;
        justify-content: center;
    }

/* CSS do novo livro */

    .newBook {
        text-align: center;
        background: #add8e6;
        padding: 30px;
    }

    .newBook p {
        font-family: Sora;
        font-size: 48px;
        font-weight: 475; 
        margin: 5px 0;
        color: #002835ff;
    }

    #frase2 {
        color: white;
        font-size: 56px;
        margin-bottom: 30px;
    }

    #new {
        background: #d1f1fcff;
        padding-left: 80px;
        padding-right: 80px;
        border-radius: 20px;
        border: 0;
        font-family: Bebas Neue;
        font-size: 72px;
        color: #002835ff;
        transition: 0.5s;
    }

    #new:hover {
        background: #002835ff;
        color: #fff;
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


                                    {{-- Barra de pesquisa --}}

<section class="search">

    <p id="proximo">Área Admin</p>

<form method="GET" action="{{ route('books.index') }}">
    <input type="text" name="search" placeholder="Buscar por título, autor, ano ou gênero" value="{{ request('search') }}">
    <button type="submit" style="padding: 8px;">Pesquisar</button>
</form>

@if($books->isEmpty())
    <p>Nenhum livro encontrado para "{{ request('search') }}".</p>
@endif
</section>

                                    {{-- Tabela --}}

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Capa</th>
            <th>Gêneros</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book ->author }}</td>
                <td>{{$book ->year}}</td>
                <td><img src="{{ asset('storage/' . $book->cover) }}" alt="Capa" width="100"></td>
                <td>{{ $book->gender->name ?? 'Sem gênero' }}</td>
                <td id="action">
                    <a href="{{ route('books.show', $book->id ) }}">Ver</a> <br>
                    <a href="{{ route('books.edit', $book->id ) }}">Editar</a> <br>
                    <a href="{{ route('books.destroy.view', $book->id) }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="navegation">
{{ $books->links('pagination::bootstrap-4') }}
</div>
</div>



                                    {{-- Botão Novo Livro --}}


<section class="newBook">

<p>Adicione um livro</p>

<div>
<a href="{{ route('books.create') }}">
    <button  id="new">+ Novo Livro</button>
</a>
</section>

</body>
