<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request)
    { 
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' =>'required|string|max:255',
            'status' => 'required|string|max:15',
            'total_amount' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255'
        ]);

        $user = new Transaction();
        $user->transaction_title = $validated['transaction_title'];
        $user->description = $validated['description'];
        $user->status = $validated['status'];
        $user->total_amount = $validated['total_amount'];
        $user->transaction_number = $validated['transaction_number'];
        $user->save();

        return redirect()->route('showAllTransactions')->with('success', 'Transaction created Successfully');
    }

    public function viewTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('transaction', ['transaction' => $transaction]);
    }

    public function editTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('edit-tansaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request)
    {
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' =>'required|string|max:255',
            'status' => 'required|string|max:15',
            'total_amount' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255' 
        ]);

        $transaction = Transaction::find($request->id);

        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('viewTransaction', ['id' => $transaction->id])->with('success', 'Transaction updated Successfully');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction)
        {
            $transaction->delete();
        }

        return redirect()->route('showAllTransactions')->with('success', 'Transaction deleted Successfully');
    }
}
