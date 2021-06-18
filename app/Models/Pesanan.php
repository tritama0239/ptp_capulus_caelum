<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table="pesanan";
    protected $primaryKey="id_pes";
    protected $fillable = ['id_pes', 'id', 'nama_cus', 'id_brg', 'hrg_jsat', 'jlh_item', 'total_hrg' ];
}

