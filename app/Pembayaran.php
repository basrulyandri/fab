<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = ['no_bukti_bayar','tgl_bayar','nominal','tagihan_id','nama_pengirim','no_rekening_pengirim','bank_pengirim','keterangan','pembayaran_via_id','user_id'];
}
