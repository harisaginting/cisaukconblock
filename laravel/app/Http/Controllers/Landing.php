<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Articles;
use App\Helpers\Harisa;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Landing extends Controller
{

    public function index()
    {   
        $article     = Articles::select("*", DB::raw("updated_at AS publish_at "))->orderBy("updated_at","desc")->limit(4)->get();
        $tarticle     = Articles::count();
    	$articlemore = false;
    	if ($tarticle > 4) {
    		$articlemore = true;
    	}
        return view('landing.main',compact('article','articlemore')); 
    }
   
    public function soon()
    {   
        return view('landing.soon'); 
    }


}