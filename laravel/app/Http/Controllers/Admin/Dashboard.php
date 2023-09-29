<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Dashboard;
// use App\Models\Anggota;
// use App\Models\Keluarga;
// use App\Models\Konfigurasi;
// use Harisa;
use Session;

class Dashboard extends Controller
{
    
    public function __construct
    (
        // Anggota $anggota,
        // Request $r
    )
    {
        // $this->anggota = $anggota;
        // $this->r       = $r;
    }



    public function index()
    {   
        // $totalAnggota                   = array();
        // $totalAnggota["all"]            = Anggota::where("visible",1)->count();
        // $totalAnggota["kakr"]           = Anggota::where("visible",1)->where("kategorial","KA/KR")->count();
        // $totalAnggota["permata"]        = Anggota::where("visible",1)->where("kategorial","PERMATA")->count();
        // $totalAnggota["mamre"]          = Anggota::where("visible",1)->where("kategorial","MAMRE")->count();
        // $totalAnggota["moria"]          = Anggota::where("visible",1)->where("kategorial","MORIA")->count();
        // $totalAnggota["saitun"]         = Anggota::where("visible",1)->where("kategorial","SAITUN")->count();
        // $totalKeluarga                  = Keluarga::count();
        return view('admin.dashboard.index'); 
    }


}