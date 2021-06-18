<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table="barang";
    protected $primaryKey="id_brg";
    protected $fillable = ['id_brg', 'nama_brg', 'stok', 'hrg_jsat', 'hrg_bsat'];
}

