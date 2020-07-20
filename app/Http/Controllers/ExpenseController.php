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

    public function updateExpense($id){
        $expenses = Expense::find($id);
        $expensesdata = Expense::where('id', $id)->get();
        //dd($expenses);
        return view('update')->with('expenses', $expenses)->with('expensesdata', $expensesdata);
    }

    public function updatedExpense(Request $request)
    {

            $expense = Expense::find($request->id);
            $expense->item = $request->item;
            $expense->amount = $request->amount;
            $expense->save();

        session()->flash('msg', 'Expense has been edited!');
        return redirect()->route('updated-expense');
    }
}
