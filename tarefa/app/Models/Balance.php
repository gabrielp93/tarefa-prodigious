<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Balance extends Model
{
    //
    public $timestamps = false; // não utilizar timestamps na tabela

    public function deposit($depositValue){

        DB::beginTransaction();

        $before = $this->total? $this->total : 0;
        $this->total = $this->total + $depositValue;
        $deposit = $this->save();

        $historic = auth()->user()->historic()->create([
            'amount'  => $depositValue, 
            'before' => $before, 
            'after'  => $this->total, 
            'type'   => 'In', 
            'date'   => date('Y-m-d')
        ]);

        if($deposit && $historic){
            DB::commit();
            return [
                'state'   => true,
                'message' => "Depósito feito com sucesso!"
            ];
        }else{
            DB::rollback();
            return [
                'state'   => false,
                'message' => "Falha ao realizar o depósito!"
            ];
        }

    }

    public function draw($drawValue){

        DB::beginTransaction();

        $before = $this->total? $this->total : 0;
        $this->total = $this->total - $drawValue;
        $draw = $this->save();

        $historic = auth()->user()->historic()->create([
            'amount'  => $drawValue, 
            'before' => $before, 
            'after'  => $this->total, 
            'type'   => 'Out', 
            'date'   => date('Y-m-d')
        ]);

        if($draw && $historic){
            DB::commit();
            return [
                'state'   => true,
                'message' => "Saque feito com sucesso!"
            ];
        }else{
            DB::rollback();
            return [
                'state'   => false,
                'message' => "Falha ao realizar o saque!"
            ];
        }

    }

    public function transfer($transferAmount, User $receiver){

        if($this->total < $transferAmount){
            return [
                'state'   => false,
                'message' => "Saldo Insuficiente!"
            ];
        }

        DB::beginTransaction();

        //Decremento do saldo do usuario autenticado

        $before = $this->total? $this->total : 0;
        $this->total = $this->total - $transferAmount;
        $transfer = $this->save();

        $historic = auth()->user()->historic()->create([
            'amount'        => $transferAmount, 
            'before'        => $before, 
            'after'         => $this->total, 
            'type'          => 'Trans', 
            'date'          => date('Y-m-d'),
            'user_id_trans' => $receiver->id,
        ]);

        //Incremento do saldo do usuario recebedor
        
        $receiverBalance = $receiver->balance()->firstOrCreate([]);
        $receiverAmountBefore = $receiverBalance->total? $receiverBalance->total : 0;
        $receiverBalance->total = $receiverBalance->total + $transferAmount;
        $transferReceiver = $receiverBalance->save();

        $historicReceiver = $receiver->historic()->create([
            'amount'        => $transferAmount, 
            'before'        => $receiverAmountBefore, 
            'after'         => $receiverBalance->total, 
            'type'          => 'In', 
            'date'          => date('Y-m-d'),
            'user_id_trans' => auth()->user()->id,
        ]);

        if($transfer && $historic && $transferReceiver && $historicReceiver){
            DB::commit();
            return [
                'state'   => true,
                'message' => "Transferência feita com sucesso!"
            ];
        }else{
            DB::rollback();
            return [
                'state'   => false,
                'message' => "Falha ao realizar a transferência!"
            ];
        }

    }
}
