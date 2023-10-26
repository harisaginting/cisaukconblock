<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;

class Landing extends Controller
{

    public function index()
    {   
        $appname = $whatsapp = "";
        $qappname = Settings::select('value')->where('name', 'name')->first();
        $qwhatsapp = Settings::select('value')->where('name', 'whatsapp')->first();
        if (!empty($qappname)) {
            $appname = $qappname->value;
        }
        if (!empty($qwhatsapp)) {
            $whatsapp = $qwhatsapp->value;
        }
        $article     = Articles::select("*", DB::raw("updated_at AS publish_at "))->orderBy("updated_at","desc")->limit(4)->get();
        $tarticle     = Articles::count();
    	$articlemore = false;
    	if ($tarticle > 4) {
    		$articlemore = true;
    	}
        return view('landing.main',compact('appname','whatsapp','article','articlemore')); 
    }
   
    public function soon()
    {   
        return view('landing.soon'); 
    }


}