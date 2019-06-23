<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepositValueValidation;
use App\User;

class AdminBalanceController extends Controller
{
    public function index(){
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance = auth()->user()->balance->total;
                
        $name = auth()->user()->name;


        return view('admin.balance.index', compact('balance','name'));
    }

    public function deposit(){
        
        return view('admin.balance.deposit');
    }

    public function depositInsert(DepositValueValidation $request){
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $depositAnswer = $balance->deposit($request->amount);

        if($depositAnswer['state']){
            return redirect()->route('admin.balance')->with('success',$depositAnswer['message']);

        }else{
            return redirect()->back()->with('fail', $depositAnswer['message']);
        }
    }

    public function draw(){
        
        return view('admin.balance.draw');
    }

    public function drawStore(DepositValueValidation $request){
        
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $drawAnswer = $balance->draw($request->amount);

        if($drawAnswer['state']){
            return redirect()->route('admin.balance')->with('success',$drawAnswer['message']);

        }else{
            return redirect()->back()->with('fail', $drawAnswer['message']);
        }
    }

    public function transfer(){
        
        return view('admin.balance.transfer');
    }

    public function transferStore(Request $request, User $user){
        
        $balance = auth()->user()->balance->total;

        if(!$receiver = $user->getReceiver($request->account,$request->emailDest)){
            return redirect()->back()->with('fail','Erro ao encontrar usuário!');
        }elseif ($receiver->id === auth()->user()->id) {
            return redirect()->back()->with('fail','Erro ao transferir!');
        }else{
            return view('admin.balance.transferConfirm',compact('receiver','balance'));
        }

    }

    public function transferConfirm(Request $request, User $user){
        

        if(!$receiver = $user->find($request->receiverId)){
            return redirect()->route('balance.transfer')->with('fail','Erro ao transferir!');
        }
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $transferAnswer = $balance->transfer($request->amount, $receiver);

        if($transferAnswer['state']){
            return redirect()->route('balance.transfer')->with('success',$transferAnswer['message']);

        }else{
            return redirect()->route('balance.transfer')->with('fail', $transferAnswer['message']);
        }
    }


}
