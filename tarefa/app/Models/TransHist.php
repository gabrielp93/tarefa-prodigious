<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class TransHist extends Model
{
    //determina quais campos pode ser modificado
    protected $fillable = [
        'amount', 'before' , 'after' , 'type', 'user_id_trans', 'date'
    ];

    public function typeFormat($type = null){

        $newTypes = array('In' => 'Depósito', 'Out' => 'Saque', 'Trans' => 'Transferência');

        if(!$type){
            return $newTypes;
        }

        if($this->user_id_trans != null && $type == 'In'){
            return 'Recebido';    
        }

        return $newTypes[$type];
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function userTransfer(){

        return $this->belongsTo('App\User', 'user_id_trans', 'id');

    }

    public function search($filterData, $numberPages = 10){

        return $this->where(function($query) use ($filterData){

            if(isset($filterData->date)){
                $query->where('date',$filterData->date);
            }

            if(isset($filterData->type)){
                $query->where('type',$filterData->type);
            }

            $query->where('user_id',auth()->user()->id);

        })->with('userTransfer')->paginate($numberPages);

    }
}
