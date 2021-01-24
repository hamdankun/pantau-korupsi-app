<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DataKasusKorupsiPertahun extends Model
{
	protected $collection = 'data_korupsi_tahun';
	
 	protected $fillable = ['Tahun' ,'jumlah_kasus', 'jumlah_tersangka', 'nilai_kerugian', 'Nilai_Suap'];   
}
