<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use function Symfony\Component\Translation\t;

class showdata extends Controller
{

    public function ShowData(){
        $ArrayIncome = [];
        $ArrayExpenses = [];
        $user_id = session('user_id');
        $transactions = Transaction::where('user_id',$user_id)->get();

        foreach ($transactions as $transaction){
            if($transaction->type == 'Income'){
                $ArrayIncome[]=$transaction;
            }
            else $ArrayExpenses[]=$transaction;
        }
        if(isset($transaction->bank)){
        $bank=$transaction->bank;
        }
        else $bank = 0;
        return view('home')->with(['data1'=>$ArrayIncome,'data2'=>$ArrayExpenses,'bank'=>$bank]);

    }
    public function DeleteData(){
        $user_id = session('user_id');
        $transactions = Transaction::where('user_id',$user_id)->get();
        foreach ($transactions as $transaction){
            $transaction->delete();
        }

        return redirect('/home');
    }
}
