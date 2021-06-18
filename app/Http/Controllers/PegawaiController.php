<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\Barang_Masuk;
use App\Models\Pesanan;


class PegawaiController extends Controller
{
    
    public function index()
    {
        
        return view('v_pegawai');
    }

    //=======================================================================================//

    public function viewstock()
    {
        $Barang = Barang::paginate(5);
        return view('stock_p.v_lihat_stock', ['Barang' => $Barang]);
    }
    
    public function searchstock(Request $request) {
        $cari = $request->q;
        $Barang= Barang::
        where('nama_brg','like',"%".$cari."%")
        ->paginate(5);
        return view('stock_p.v_lihat_stock',['Barang' => $Barang]);
    }

    public function addstock()
    {   
        return view('stock_p.v_add_stock');
    }

    public function savestock(Request $request)
    {
        Barang::create([
            'id_brg' => $request -> id_brg,
            'nama_brg' => $request -> nama_brg,
            'stok' => $request -> stok,
            'hrg_jsat' => $request -> hrg_jsat,
            'hrg_bsat' => $request -> hrg_bsat
        ]);
        return redirect('/pegawai/barang/viewstock');
        
    }

    public function addstock1()
    {
        $Barang = Barang::all();
        return view('stock_p.v_stock_in', ['Barang' => $Barang]);
    }

    public function savestock1(Request $request)
    {

        Barang_Masuk::create([
            'id_brg_in' => $request -> id_brg_in,
            'id_brg' => $request -> id_brg,
            'stok_in' => $request -> stok_in
        ]);

        return redirect('/pegawai/barang/viewstock');
        
    }

    public function editstock($id_brg) {
        $Barang = Barang::find($id_brg);
        return view('stock_p.v_edit_stock', ['Barang' => $Barang]);
    }

    public function updatedstock($id_brg, Request $request) {
        $Barang = Barang::find($id_brg);
        $Barang->nama_brg = $request->nama_brg;
        $Barang->stok = $request->stok;
        $Barang->hrg_bsat = $request->hrg_bsat;
        $Barang->hrg_jsat = $request->hrg_jsat;
        $Barang->save();
    
     return redirect("/pegawai/barang/viewstock");
    }
    
     public function deletestock($id_brg) {
        $Barang = Barang::find($id_brg);
        $Barang->delete();
        return redirect('/pegawai/barang/viewstock');
    }

    

    //=======================================================================================//

    public function vieworder()
    {
        $Pesanan = Pesanan::paginate(5);
        return view('order_p.v_lihat_order', ['Pesanan' => $Pesanan]);
    }
    
    public function searchorder(Request $request) {
        $cari = $request->q;
        $Pesanan= Pesanan::
        where('nama_cus','like',"%".$cari."%")
        ->paginate(5);
        return view('order_p.v_lihat_order',['Pesanan' => $Pesanan]);
    }

    public function addorder()
    {   
        $Barang = Barang::all();
        return view('order_p.v_add_order', ['Barang' => $Barang]);
    }

    public function saveorder(Request $request)
    {
        
        Pesanan::create([
            'id_pes' => $request -> id_pes,
            'id' => $request -> id,
            'nama_cus' => $request -> nama_cus,
            'id_brg' => $request -> id_brg,
            'hrg_jsat' => $request -> hrg_jsat,
            'jlh_item' =>  $request -> jlh_item,
            'total_hrg' => $request -> total_hrg
        ]);

        return redirect('/pegawai/pesanan/vieworder');
    }

    public function editorder($id_pes) {
        $Pesanan = Pesanan::find($id_pes);
        return view('order_p.v_edit_order', ['Pesanan' => $Pesanan]);
    }

    public function updatedorder($id_pes, Request $request) {
        $Pesanan = Pesanan::find($id_pes);
        $Pesanan->id_brg = $request->id_brg;
        $Pesanan->jlh_item = $request->jlh_item;
        $Pesanan->total_hrg = $request->total_hrg;
        $Pesanan->save();
    
     return redirect("/pegawai/pesanan/vieworder");
    }
    
     public function deleteorder($id_pes) {
        $Pesanan = Pesanan::find($id_pes);
        $Pesanan->delete();
        return redirect('/pegawai/pesanan/vieworder');
    }

    

}