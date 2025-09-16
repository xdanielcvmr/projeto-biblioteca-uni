<h1>Detalhes do Gênero</h1>

<p><strong>ID:</strong> {{ $gender->id }}</p>
<p><strong>Nome:</strong> {{ $gender->nome }}</p>

<a href="{{ route('genders.edit', $gender->id) }}">Editar</a>
<a href="{{ route('genders.destroy.view', $gender->id) }}">Excluir</a>
<a href="{{ route('genders.index') }}">Voltar</a>