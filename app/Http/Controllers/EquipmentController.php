<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreUpdateEquipment;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::all();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments/create');
    }

    public function store(StoreUpdateEquipment $request)
    {
        Equipment::create($request->all());

        return redirect()->route('equipments.index')->with('sucess', 'equipamento adicionado com sucesso!');
    }

    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    public function update(StoreUpdateEquipment $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        return redirect()->route('equipments.index')->with('sucess', 'Equipamento atualizada com sucesso!');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipments.index')->with('sucess', 'Equipamento excluído com sucesso!');
    }
}
