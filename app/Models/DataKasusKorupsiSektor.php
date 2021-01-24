<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DataKasusKorupsiSektor extends Model
{
    protected $collection = 'kasus_korupsi_sektor';

    protected $fillable = ['Tahun', 'Sektor', 'Jumlah_Kasus', 'Nilai_Kerugian'];
}
