<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function listTransactions()
    {
        $transaction = Transaction::latest()->get();
        return view('transactions.list',compact('transaction'));
    }

    public function addTransactions()
    {
   
        return view('transactions.add');
    }

    public function storeTransactions(Request $request){

        $request->validate([
            'payer' => 'required',
            'account_name_id' => 'required',
            'date' => 'required',
            'amount' => 'required|numeric',
            'type' => 'required',
            'method' => 'required',
            'category' => 'required',
        ]);
       
        $data = array();
        $data['payer'] = $request->payer;
        $data['account_name_id'] = $request->account_name_id;
        $data['date'] = $request->date;
        $data['amount'] = $request->amount;
        $data['type'] = $request->type;
        $data['method'] = $request->method;
        $data['category'] = $request->category;
        $data['note'] = $request->note;

       
        
        Transaction::create($data);
        return Redirect()->route('list.transactions')->with('success', 'Transactions Inserted Successfully!');
        
    }

    public function deleteTransactions($id)
    {

        $transaction = Transaction::findOrFail($id);
        
        $transaction->delete();
    
        return redirect()->back()->with('delete', 'Transaction successfully deleted');
    }

    // Income 
    public function incomeTransactions()
    {
        $transaction = Transaction::latest() ->where('type', 'income')->get();
        return view('transactions.income',compact('transaction'));
    }

     // Expense 
     public function expenseTransactions()
     {
         $transaction = Transaction::latest() ->where('type', 'expense')->get();
         return view('transactions.expense',compact('transaction'));
     }

     // Filter account-statement
     public function filterTransactions(Request $request)
{
    // Validate input
    $request->validate([
        'account_name_id' => 'required|exists:accounts,id',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
    ]);

    // Retrieve form inputs
    $accountId = $request->account_name_id;
    $transactionType = $request->type;
    $fromDate = $request->from_date;
    $toDate = $request->to_date;

    // Build query to fetch transactions
    $query = DB::table('transactions')
                ->where('account_name_id', $accountId)
                ->whereBetween('date', [$fromDate, $toDate]);

    // If a transaction type is selected, apply it as a filter
    if ($transactionType) {
        $query->where('type', $transactionType);
    }

    // Get the filtered transactions
    $transactions = $query->get();

    // Pass data to the view
    return view('transactions.index', compact('transactions'));
}


}
