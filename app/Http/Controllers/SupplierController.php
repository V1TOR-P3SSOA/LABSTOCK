<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupplier;
use App\Models\Supplier;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers/index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers/create');
    }

    public function store(StoreUpdateSupplier $request)
    {
        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('sucess', 'fornecedor adicionado com sucesso!');
    }


    public function edit(Supplier $supplier)
    {
        return view('suppliers/edit', compact('supplier'));
    }

    public function update(StoreUpdateSupplier $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('sucess', 'Fornecedor atualizada com sucesso!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('sucess', 'fornecedor excluído com sucesso!');
    }
}
