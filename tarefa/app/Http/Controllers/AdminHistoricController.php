<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransHist;

class AdminHistoricController extends Controller
{
    //

    public function historic($numberPages = 10, TransHist $historic){

        //dd($extract = auth()->user()->historic);
        $extracts = auth()->user()->historic()->with('userTransfer')->paginate($numberPages);
        //dd($extracts);

        $types = $historic->typeFormat(); 

        return view('admin.balance.historic',compact('extracts','types'));
    }

    public function searchExtract(Request $request, TransHist $historic){
        
        $allFilterData = $request->except('_token');
        
        $extracts = $historic->search($request, $request->rows);

        $types = $historic->typeFormat(); 

        return view('admin.balance.historic',compact('extracts', 'types','allFilterData'));


    }

}
