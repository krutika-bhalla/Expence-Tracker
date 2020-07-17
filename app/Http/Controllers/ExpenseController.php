<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'amount' => 'required|numeric',
        ]);

        $expense = new Expense();
        $expense->item = $request->item;
        $expense->amount = $request->amount;
        $expense->save();

        return redirect('/home');
    }

    public function showExpenses(){
        $expenses = Expense::all();
        return view('home')->with('expenses', $expenses);
    }

    public function deleteExpense($id){
        $expense = Expense::find($id);
//        dd($expense);
        $expense->delete($id);
        return redirect()->back();
    }
    public function editExpense($id){
        $expense = Expense::find($id);
        $expenses = Expense::all();
        return redirect('edit-expense')->with('expenses', $expenses)->with('expense', $expense);
    }
}
