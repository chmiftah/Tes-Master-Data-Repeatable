<?php

namespace App\Http\Controllers;

use App\model\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('transaksi.index');
    }
    public function list(){
        $transaksi=Transaksi::latest()->paginate(5);
        return view('transaksi.list', compact('transaksi'));
    }

    public function post(Request $request){
        $request->validate([
             'description'=>'required',
             'code'=>'required',
            'rate'=>'required',
             'date_paid'=>'required',
             'kategori'=>'required',
            'nama_transaksi' => 'required',
            'nominal' => 'required'
        ]);

        $count = count($request->nama_transaksi);
        for($i=0; $i<$count; $i++){
            $task=new Transaksi();
             $task->description=$request->description;
             $task->rate=$request->rate;
             $task->date_paid=$request->date_paid;
            $task->kategori=$request->kategori;
            $task->code=$request->code;
            $task->nama_transaksi=$request->nama_transaksi[$i];
            $task->nominal=$request->nominal[$i];
            $task->save();
        }
        return  redirect(route('transaksi.list'))->with('success', 'transaksi berhasil ditambah');
    }
    public function cari(Request $request){
        $cari = $request->cari;
        $transaksi = Transaksi::where('nama_transaksi','like',"%".$cari."%")->paginate(5);
        return view('transaksi.list', compact('transaksi'));
    }

    public function cari_tgl(Request $request){
        $transaksi = Transaksi::whereBetween('date_paid',[$request->date1,$request->date2])
        ->paginate(5);
        return view('transaksi.list', compact('transaksi'));
    }
    public function filter(Request $request){
        if($request->filter=="asc"){
            $transaksi=Transaksi::orderBy('nominal', 'ASC')->paginate(5);
        }else if($request->filter=="desc"){
            $transaksi=Transaksi::orderBy('nominal', 'DESC')->paginate(5);
        }
       return view('transaksi.list', compact('transaksi'));
    }
    public function edit(Transaksi $transaksi){
      return view('transaksi.edit', compact('transaksi'));
    }
    public function update(Transaksi $transaksi){
        request()->validate([
            'description'=>'required',
            'code'=>'required',
           'rate'=>'required',
            'date_paid'=>'required',
            'kategori'=>'required',
           'nama_transaksi' => 'required',
           'nominal' => 'required'
       ]);
       $transaksi->update([
        'description'=>request('description'),
        'code'=>request('code'),
        'rate'=>request('rate'),
        'date_paid'=>request('date_paid'),
        'kategori'=>request('kategori'),
        'nama_transaksi'=>request('nama_transaksi'),
        'nominal'=>request('nominal'),
       ]);
       return redirect(route('transaksi.list'))->with('success', 'transaksi berhasil diupdate');
      }

      public function destroy(Transaksi $transaksi){
          $transaksi->delete();
          return redirect(route('transaksi.list'))->with('success', 'data transaksi berhasil dihapus');

      }

}



