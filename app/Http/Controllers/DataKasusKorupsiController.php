<?php

namespace App\Http\Controllers;

use App\Models\DataKasusKorupsiPertahun;
use App\Models\DataKasusKorupsiPerDaerah;
use App\Models\DataKasusKorupsiLembaga;
use App\Models\DataKasusKorupsiSektor;
use Illuminate\Http\Request;
use Faker\Factory;

class DataKasusKorupsiController extends Controller
{

    /**
     * Display dashboard page
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('dashboard');

    }

    public function dataKasusKorupsiPertahun(DataKasusKorupsiPertahun $dataKasusKorupsiPertahunModel) {

        $kasusPertahun = $dataKasusKorupsiPertahunModel->orderBy('Tahun', 'asc')->get();

        $data['tahun'] = $kasusPertahun->map(function($kasus) {
            return $kasus->Tahun;
        })->all();

        $data['jumlah_kasus'] = $kasusPertahun->map(function($kasus) {
            return $kasus->jumlah_kasus;
        })->all();

        $data['jumlah_tersangka'] = $kasusPertahun->map(function($kasus) {
            return $kasus->jumlah_tersangka;
        })->all();

        $data['nilai_kerugian'] = $kasusPertahun->map(function($kasus) {
            return $kasus->nilai_kerugian;
        })->all();

        $data['nilai_suap'] = $kasusPertahun->map(function($kasus) {
            return $kasus->Nilai_Suap;
        })->all();


        return view('kasus_korupsi_pertahun', $data);
    }

    public function dataKasusKorupsiPerDaerah(DataKasusKorupsiPerDaerah $dataKasusKorupsiPerDaerah) {
        $provinsi = $dataKasusKorupsiPerDaerah->groupBy('Provinsi')->get(['Provinsi'])->map(function($daerah) {
            return $daerah->Provinsi;
        });

        $data['provinsi'] = $provinsi->all();
        $data['jumlah_kasus'] = [];

        foreach ($provinsi as $key => $daerah) {
            $data['jumlah_kasus'][] = $dataKasusKorupsiPerDaerah->where('Provinsi', $daerah)->sum('Jumlah Kasus');
        }

        $faker = Factory::create();

        $data['hexcolor'] = [];

        for ($i = 0; $i < count($data['provinsi']) ; $i++) {
            array_push($data['hexcolor'], $faker->hexcolor);
        }
        
        return view('kasus_korupsi_daerah', $data);
    }

    public function dataKasusKorupsiPerLembaga(DataKasusKorupsiLembaga $dataKasusKorupsiLembaga) {
        $provinsi = $dataKasusKorupsiLembaga->groupBy('Lembaga')->get(['Lembaga'])->map(function($daerah) {
            return $daerah->Lembaga;
        });

        $data['lembaga'] = $provinsi->all();
        $data['jumlah_kasus'] = [];

        foreach ($provinsi as $key => $daerah) {
            $data['jumlah_kasus'][] = $dataKasusKorupsiLembaga->where('Lembaga', $daerah)->sum('Jumlah_Kasus');
        }

        $faker = Factory::create();

        $data['hexcolor'] = [];

        for ($i = 0; $i < count($data['lembaga']) ; $i++) {
            array_push($data['hexcolor'], $faker->hexcolor);
        }

        return view('kasus_korupsi_lembaga', $data);
    }

    public function dataKasusKorupsiPerSektor(DataKasusKorupsiSektor $dataKasusKorupsiSektor) {
        $provinsi = $dataKasusKorupsiSektor->groupBy('Sektor')->get(['Sektor'])->map(function($daerah) {
            return $daerah->Sektor;
        });

        $data['sektor'] = $provinsi->all();
        $data['jumlah_kasus'] = [];

        foreach ($provinsi as $key => $daerah) {
            $data['jumlah_kasus'][] = $dataKasusKorupsiSektor->where('Sektor', $daerah)->sum('Jumlah_Kasus');
        }

        $faker = Factory::create();

        $data['hexcolor'] = [];

        for ($i = 0; $i < count($data['sektor']) ; $i++) {
            array_push($data['hexcolor'], $faker->hexcolor);
        }
        return view('kasus_korupsi_sektor', $data);
    }

}
