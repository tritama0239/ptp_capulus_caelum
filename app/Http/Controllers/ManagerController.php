<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Exports\PesananExport;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Pesanan;


class ManagerController extends Controller
{
    public function index()
    {
        return view('v_manager');
    }

    public function viewstock()
    {
        $Barang = Barang::paginate(5);
        return view('report_m.v_lihat_stock', ['Barang' => $Barang]);
    }

    public function searchstock(Request $request) {
        $cari = $request->q;
        $Barang= Barang::
        where('nama_brg','like',"%".$cari."%")
        ->paginate(5);
        return view('report_m.v_lihat_stock',['Barang' => $Barang]);
    }

    public function vieworder()
    {   
        $Pesanan = Pesanan::paginate(5);
        return view('report_m.v_lihat_order', ['Pesanan' => $Pesanan]);
    }

    public function searchorder(Request $request) {
        $cari = $request->q;
        $Pesanan= Pesanan::
        where('nama_cus','like',"%".$cari."%")
        ->paginate(5);
        return view('report_m.v_lihat_order',['Pesanan' => $Pesanan]);
    }

    public function viewreport()
    {
        $Transaksi = Transaksi::paginate(5);
        return view('report_m.v_lihat_report', ['Transaksi' => $Transaksi]);
    }

    public function searchreport(Request $request) {
        $cari = $request->q;
        $Transaksi= Transaksi::
        where('id_trans','like',"%".$cari."%")
        ->paginate(5);
        return view('report_m.v_lihat_report',['Transaksi' => $Transaksi]);
    }

    public function viewgrafik()
    {
        $Transaksi = Transaksi::all();
    
        // Menyiapkan data untuk chart
        $bulan = [];
        $data = [];
        $biaya = [];

        foreach($Transaksi as $rp){
            $bulan[] = $rp->bulan->format('M');
            $data[] = $rp->modal;
            $biaya[] = $rp->pemasukkan;

        }

        return view('report_m.v_lihat_grafik', ['Transaksi' => $Transaksi,'bulan' => $bulan,'data' => $data,'biaya' => $biaya]);
    }

    public function export() 
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }

    public function export1() 
    {
        return Excel::download(new PesananExport, 'pesanan.xlsx');
    }

    public function export2() 
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
