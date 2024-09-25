<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Mutasi;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id) {
            $list = Barang::find($request->id); 
            if ($list) {
                return $list;
            } else {
                return response()->json([]);
            }             
        } elseif($request->name) {
            //TODO all column search
            //return Barang::find($request->name);      
            return response()->json([]);  
        } else {            
            return Barang::all();
        }
    }

    public function create(Request $request)
    {        
        $barang = new Barang;
 
        $barang->name = $request->name;
        $barang->kode = $request->kode;
        $barang->kategori = $request->kategori;
        $barang->lokasi = $request->lokasi;
        $barang->dimensi = $request->dimensi;
        $barang->berat = $request->berat;

        $barang->save();
        return response()->json(["message" => "success", "barang" => $barang]);
    }

    public function update(Request $request)
    {        
        $barang = Barang::find($request->id);
        $barang->name = $request->name;
        $barang->kode = $request->kode;
        $barang->kategori = $request->kategori;
        $barang->lokasi = $request->lokasi;
        $barang->dimensi = $request->dimensi;
        $barang->berat = $request->berat;
        
        $barang->save();
        return response()->json(["message" => "success", "barang" => $barang]);
    }

    public function delete(Request $request)
    {
        $history = Mutasi::where('barangId', $request->barangId)->get();
        if ($history) {
            return response()->json(["message" => "Can't delete due to data integrity with mutasi"]);
        } else {
            $barang = Barang::find($request->id);
            $barang->delete();
            if ($barang) {
                return response()->json(["message" => "barang with id ".$request->id." was deleted"]);
            } else {
                return response()->json(["message" => "correct id is required"]);
            }
        }
    }
}
