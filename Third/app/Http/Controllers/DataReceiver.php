<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DataReceiver extends Controller
{

    public function DataInput(Request $request)
    {
        $request->validate([
            'amount' => 'required|nullable|numeric',

        ]);
        if ($request->type == 'type1') {
            $type = 'Expenses';
        } else $type = 'Income';

        $user_id = session('user_id');
        if ($request->date == NULL) {
            $request->date = date('Y-m-d H:i:s');
        }
        $user = Transaction::where('user_id',$user_id)->latest()->first();

        if($user === null||$user->bank === null){

            $bank = 0;
        }
        else $bank = $user->bank;
        /* If type 1 amount '-'
         * If type 2 amount '+'
         *
         */
        if($type == 'Expenses'){
            $bank = $bank-$request->amount;
        }
        else $bank =$bank+$request->amount;
        $transaction = Transaction::create([
            'user_id' => $user_id,
            'type' => $type,
            'category' => $request->category,
            'date' => $request->date,
            'amount' => $request->amount,
            'comment' => $request->Comment,
            'bank'=>$bank


        ]);
        if($request->Comment==null){
            $transaction->Comment = '--No comment--';
        }
        $transaction->save();
        return redirect('/home')->with(['type'=>$type,'amount'=> $request->amount,'category'=>$request->category,'bank'=>$bank]);


    }
}

