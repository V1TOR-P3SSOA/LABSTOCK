<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Equipment;
use App\Models\User;
use App\Http\Requests\StoreUpdateLoan;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['equipment', 'user'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        $users = User::all();
        return view('loans/create', compact('equipments', 'users'));
    }
    public function store(StoreUpdateLoan $request)
    {
        Loan::create($request->validated());
        
        return redirect()->route('loans.index')->with('status', 'reserva registrada com sucesso!');
    }

    public function edit(Loan $loan)
    { 
        $equipments = Equipment::all();
        $users = User::all();
        return view('loans.edit', compact('loan', 'equipments', 'users'));
    }
    public function update(StoreUpdateLoan $request, Loan $loan)
    {
        $loan->update($request->validated());
        
        return redirect()->route('loans.index')->with('status', 'Reserva atualizada!');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('status', 'Reserva excluída com sucesso!');
    }
}
