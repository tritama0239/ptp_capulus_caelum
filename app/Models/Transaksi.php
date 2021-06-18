<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table="transaksi";
    protected $primaryKey="id_trans";
    protected $fillable = ['id_trans', 'modal', 'id_brg', 'pemasukkan', 'bulan'];
    protected $dates = ['bulan'];
}

