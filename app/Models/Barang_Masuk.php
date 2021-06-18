<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang_Masuk extends Model
{
    protected $table="barang_masuk";
    protected $primaryKey="id_brg_in";
    protected $fillable = ['id_brg_in', 'id_brg', 'stok_in'];
}

