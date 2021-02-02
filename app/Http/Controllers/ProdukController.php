<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use DB;
class ProdukController extends Controller
{
    public function index(){
        $produk = produk::all();
        return view('index', compact('produk'));
    }

    public function tambah_produk(Request $request)
    {
       $data= DB::table('produk')->insert([
            'nama_produk' => $request->namaProduk,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ]);

        if ($data) {
            $notif = array(
                'message'    => 'Data Berhasil Ditambah',
                'alert-type' => 'success'
            );      
        } else {
            $notif = array(
                'message'    => 'Data Yang anda Masukkan Salah',
                'alert-type' => 'error'
            );  
        }
        
        
        return redirect()->back()->with($notif);
        
    }

    public function edit_produk(Request $request)
    {
            
        $data = produk::where('id_produk',$request->id_produk)           
            ->update([
                'nama_produk' => $request->namaProduk,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah

              ]);

              $notification = array(
                'message' => 'I am a successful message!', 
                'alert-type' => 'success'
            );
            
            
            return redirect()->back()->with($notification);
           
    }

    public function hapus_produk(Request $req){
        $data = produk::where('id_produk', $req->id_produk)->delete();
        if ($data) {
            $notif = array(
                'message'    => 'Data Berhasil di Edit',
                'alert-type' => 'success'
            );      
        } else {
            $notif = array(
                'message'    => 'Data Yang anda Masukkan Salah',
                'alert-type' => 'error'
            );  
        }
        return redirect()->back()->with($notif);
    }
}
