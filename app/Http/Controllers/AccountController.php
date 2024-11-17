<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function listAccount()
    {
        $accountList = Account::latest()->get();
        return view('accounts.list',compact('accountList'));
    }


    public function addAccount()
    {
        return view('accounts.add');
    }

    public function storeAccount(Request $request){

        $request->validate([
            'account_name' => 'required|unique:accounts',
            'account_no' => 'required|unique:accounts',
            'initial_balance' => 'required|numeric',
        ]);
       
        $data = array();
        $data['account_name'] = $request->account_name;
        $data['account_no'] = $request->account_no;
        $data['initial_balance'] = $request->initial_balance;
        $data['note'] = $request->note;

       
        
        Account::create($data);
        return Redirect()->route('list.account')->with('success', 'Account Inserted Successfully!');
        
    }

    public function deleteAccount($id)
    {

        $account = Account::findOrFail($id);
        
        $account->delete();
    
        return redirect()->back()->with('delete', 'Account successfully deleted');
    }

    public function balanceSheet()
    {
        // Get the list of accounts with non-null account numbers
        $accountList = Account::whereNotNull('account_no')->get();
    
        // Fetch transactions where the account name ID is in the list of account IDs
        $transactionList = Transaction::whereIn('account_name_id', $accountList->pluck('id'))->get();
    
        // Calculate total balance (initial balance + transaction amounts)
        $totalBalance = 0;
        foreach ($accountList as $account) {
            // Sum transactions for this account
            $accountTransactions = $transactionList->where('account_name_id', $account->id);
            $transactionTotal = $accountTransactions->sum('amount');
            
            // Add the initial balance and transaction total to the running total
            $totalBalance += $account->initial_balance + $transactionTotal;
        }
    
        // Pass the account list, transaction list, and total balance to the view
        return view('accounts.balance-sheet', compact('accountList', 'transactionList', 'totalBalance'));
    }
    
    

}
