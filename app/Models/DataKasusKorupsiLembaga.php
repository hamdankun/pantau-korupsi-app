<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DataKasusKorupsiLembaga extends Model
{
    protected $collection = 'kasus_korupsi_lembaga';

    protected $fillable = ['Tahun', 'Lembaga', 'Jumlah_Kasus', 'Nilai_Kerugian'];
}
