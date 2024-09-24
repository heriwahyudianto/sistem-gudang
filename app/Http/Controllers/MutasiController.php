<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mutasi;

class MutasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id) {
            $list = Mutasi::find($request->id); 
            if ($list) {
                return $list;
            } else {
                return response()->json([]);
            }             
        } elseif($request->tglMutasi) {
            //TODO all column search
            //return Mutasi::find($request->tglMutasi);      
            return response()->json([]);  
        } else {            
            return Mutasi::all();
        }
    }

    public function create(Request $request)
    {        
        $mutasi = new Mutasi;
 
        $mutasi->jenis_mutasi = $request->jenis_mutasi;
        $mutasi->jumlah = $request->jumlah;
        $mutasi->tglMutasi = $request->tglMutasi;
        $mutasi->userId = $request->userId;
        $mutasi->mutasiId = $request->mutasiId;

        $mutasi->save();
        return response()->json(["message" => "success", "mutasi" => $mutasi]);
    }

    public function delete(Request $request)
    {
        $mutasi = Mutasi::find($request->id);
        $mutasi->delete();
        if ($mutasi) {
            return response()->json(["message" => "mutasi with id ".$request->id." was deleted"]);
        } else {
            return response()->json(["message" => "correct id is required"]);
        }
    }

    public function update(Request $request)
    {        
        $mutasi = Mutasi::find($request->id);
        $mutasi->jenis_mutasi = $request->jenis_mutasi;
        $mutasi->jumlah = $request->jumlah;
        $mutasi->tglMutasi = $request->tglMutasi;
        $mutasi->userId = $request->userId;
        $mutasi->barangId = $request->barangId;
        
        $mutasi->save();
        return response()->json(["message" => "success", "mutasi" => $mutasi]);
    }

    public function historyByUserId(Request $request)
    {
        $history = Mutasi::where('userId', $request->userid)
               ->get();
        if ($history) {
            return $history;
        } else {
            return response()->json([]);
        }             
        
    }
    
    public function historyByBarangId(Request $request)
    {
        $history = Mutasi::where('barangId', $request->barangId)
               ->get();
        if ($history) {
            return $history;
        } else {
            return response()->json([]);
        }             
        
    }
}
