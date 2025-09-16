<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index() {
        // Tem várias operações all (busca todos registros da tabela), create, update, find, delete 
        // SELECT * FROM gender
        $genders = Gender::all();

        return view('gender.index', ['genders' => $genders]);
    }


        public function show($id) {
        $gender = Gender::findOrFail($id);
        return view('gender.show', compact('gender'));
    }


    public function store(Request $request) {
        $name = $request->input('name');

        Gender::create([ // INSERT INTO gender ...
            'name' => $name
        ]);

        return redirect('/genders');
    }


    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $gender = Gender::findOrFail($id);
        $gender->name = $validated['name'];
        $gender->save();

        return redirect()->route('genders.index')->with('success', 'Gênero atualizado com sucesso!');
    }


    public function destroyView($id)
{
    $gender = Gender::findOrFail($id);
    return view('gender.destroy', compact('gender'));
}


    public function destroy($id)
{
    $gender = Gender::findOrFail($id);

    if ($gender->books()->exists()) {
        return back()->with('error', 'Não é possível excluir um gênero com livros associados.');
    }

    $gender->delete();

    return redirect()->route('genders.index')->with('success', 'Gênero excluído com sucesso!');
}


    public function create() {
        return view('gender.create');
    }


    public function edit($id) {
        $gender = Gender::findOrFail($id);
        return view('gender.edit', compact('gender'));
    }
}
