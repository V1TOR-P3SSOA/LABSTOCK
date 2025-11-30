<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\User;
use App\Http\Requests\StoreUpdateResearch;

class ResearchController extends Controller
{
        public function index()
    {
        $researches = Research::with(['user'])->get();
        return view('researches.index', compact('researches'));
    }

    public function create()
    {
        $users = User::all();
        return view('researches.create', compact('users'));
    }

    public function store(StoreUpdateResearch $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Research::create($data);
        return redirect()->route('researches.index')->with('success', 'Pesquisa cadastrada com sucesso!');
    }

    public function edit(Research $research)
    {
        $users = User::all();
        return view('researches.edit', compact('research','users'));
    }

    public function update(StoreUpdateResearch $request, Research $research)
    {
        $loan = Research::findOrFail($research->id);
        $loan->update($request->all());
        return redirect()->route('researches.index')->with('success', 'Pesquisa atualizada!');
    }

    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('researches.index')->with('sucess', 'Pesquisa excluída com sucesso!');
    }
}
