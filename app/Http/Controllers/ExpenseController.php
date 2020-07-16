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


}
