<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest()
            ->get();
        $total = Expense::sum('amount');

        return view('home', [
            'total' => $total,
            'expenses' => $expenses,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'amount' => 'required|numeric',
        ], [
            'item.required' => 'Item is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount should be number',
        ]);

        $expense = new Expense();
        $expense->item = $request->item;
        $expense->amount = $request->amount;
        $expense->save();

        return back();
    }

    public function edit(Expense $expense)
    {
        // dd($expense);
        $expenses = Expense::latest()
            ->get();
        $total = Expense::sum('amount');

        return view('update', [
            'total' => $total,
            'expenses' => $expenses,
            'expense' => $expense,
        ]);
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'item' => 'required',
            'amount' => 'required|numeric',
        ], [
            'item.required' => 'Item is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount should be number',
        ]);

        $expense->item = $request->item;
        $expense->amount = $request->amount;
        $expense->save();

        return redirect()->route('home');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();
        return back();
    }
}
