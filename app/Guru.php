<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['nama', 'nip', 'jabatan', 'departemen', 'gaji', 'join_date'];

}
