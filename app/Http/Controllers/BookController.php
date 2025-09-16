<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Models\Gender;


class BookController extends Controller
{
    // Listar todos os livros com seus gêneros - INDEX
    public function index()
    {
        $search = request('search');

        $books = Book::with('gender')
        ->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%")
                  ->orWhereHas('gender', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        })
        ->paginate(5);

    return view('admin.index', compact('books'));

    }




    // Mostrar detalhes de um livro específico - SHOW
    public function show($id)
    {
        $book = Book::with('gender')->findOrFail($id);
        return view('admin.show', compact('book'));
    }




    // Formulário de criação de livro - CREATE
    public function create()
    {
        $genders = Gender::all();
        return view('admin.create', compact('genders'));
    }




    // Formulário de confirmação de exclusão - DESTROYVIEW
    public function destroyView($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.destroy', compact('book'));
    }




    // Excluir livro - DESTROY
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.index');
    }




    // Formulário de edição de livro - EDIT
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genders = Gender::all();
        return view('admin.edit', compact('book', 'genders'));
    }




    // Atualizar livro existente - UPDATE
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|max:' . date('Y'),
            'gender_id' => 'required|exists:genders,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books.index');
    }




     // Salvar novo livro - STORE
    public function store(StoreBookRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('cover')) {
        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        // Salva em storage/app/public/covers
        $file->storeAs('covers', $filename, 'public');
        // Salva o caminho completo para ser usado com asset('storage/' . $cover)
        $data['cover'] = 'covers/' . $filename;
    }

    Book::create($data);

    return redirect()->route('admin.index');
}

}
