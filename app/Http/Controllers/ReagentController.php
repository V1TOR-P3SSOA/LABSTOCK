<?php

namespace App\Http\Controllers;

use App\Models\Reagent;
use App\Http\Requests\StoreUpdateReagent;

class ReagentController extends Controller
{
    public function index()
    {
        $reagents = Reagent::all();
        return view('reagents/index', compact('reagents'));
    }

    public function create()
    {
        return view('reagents/create');
    }

    public function store(StoreUpdateReagent $request)
    {
        Reagent::create($request->all());

        return redirect()->route('reagents.index')->with('status', 'reagente adicionado com sucesso!');
    }

    public function edit(Reagent $reagent)
    {
        return view('reagents.edit', compact('reagent'));
    }

    public function update(StoreUpdateReagent $request, Reagent $reagent)
    {
        $reagent->update($request->all());
        return redirect()->route('reagents.index')->with('status', 'Reagente atualizada com sucesso!');
    }

    public function destroy(Reagent $reagent)
    {
        $reagent->delete();
        return redirect()->route('reagents.index')->with('status', 'reagente excluído com sucesso!');
    }
}
