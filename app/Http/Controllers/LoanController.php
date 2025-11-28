<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Loan::create($request->all());
        return redirect()->route('loans.index')->with('sucess', 'reserva registrada com sucesso!');
    }

    public function edit(Loan $loan)
    {
        return view('loans.edit', compact('loan'));
    }

    public function update(Request $request, Loan $loan)
    {
        $loan->update($request->all());
        return redirect()->route('loans.index')->with('sucess', 'Reserva atualizada com sucesso!');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('sucess', 'Reserva excluída com sucesso!');
    }
}
