<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DataKasusKorupsiPerDaerah extends Model
{
    protected $collection = 'kasus_korupsi_daerah';

    protected $fillable = ['Tahun', 'Provinsi', 'Jumlah Kasus', 'Nilai_Kerugian'];
}
