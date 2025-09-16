<style>
    body {
        margin: 0;
        padding: 0;
    }
</style>

<body>

<div style="background-color: #F1F1F1; text-align: center; font-size: 32px; margin-bottom: 15px; padding: 10px;">
    <a href="{{ route('books.index') }}" style="text-decoration: none" >Home</a>
    <br>
    <a style="text-decoration: none" href="{{ route('genders.index') }}">Gêneros</a>
</div>

<div style="margin-left: 20px; text-align: center">

<a href="{{ route('genders.create') }}" style="display:inline-block; margin-bottom: 10px;">
    <button style="padding: 6px 12px;">+ Novo Gênero</button>
</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin: auto;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($genders as $gender)
            <tr>
                <td>{{ $gender->name }}</td>
                <td>
                    <a href="{{ route('genders.show', $gender->id ) }}">Ver</a> <br>
                    <a href="{{ route('genders.edit', $gender->id ) }}">Editar</a> <br>
                    <a href="{{ route('genders.destroy.view', $gender->id) }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>   
</div>
</body>
