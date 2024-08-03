<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;
use App\Helpers\Harisa;
use Illuminate\Http\Request;

class Landing extends Controller
{

    public function index()
    {   
        $appname = "";
        $email = $phone = "";
        $whatsapp = $facebook = "";
        $instagram = $linkedin = "";
        $address_district = $address_street = $address_lat = $address_lng = $gtag = "";

        $qappname = Settings::select('value')->where('name', 'name')->first();
        $qemail = Settings::select('value')->where('name', 'email')->first();
        $qphone = Settings::select('value')->where('name', 'phone')->first();
        $qwhatsapp = Settings::select('value')->where('name', 'whatsapp')->first();
        $qfacebook = Settings::select('value')->where('name', 'facebook')->first();
        $qinsragram = Settings::select('value')->where('name', 'instagram')->first();
        $qlinkedin = Settings::select('value')->where('name', 'linkedin')->first();
        $qaddress_district = Settings::select('value')->where('name', 'address_district')->first();
        $qaddress_street = Settings::select('value')->where('name', 'address_street')->first();
        $qaddress_lat = Settings::select('value')->where('name', 'address_lat')->first();
        $qaddress_lng = Settings::select('value')->where('name', 'address_lng')->first();
        $qgtag = Settings::select('value')->where('name', 'google_analytic_tag')->first();
        if (!empty($qappname)) {
            $appname = Harisa::getSettingByName('name');    
        }
        if (!empty($qemail)) {
            $email = $qemail->value;
        }
        if (!empty($qphone)) {
            $phone = $qphone->value;
        }
        if (!empty($qwhatsapp)) {
            $whatsapp = $qwhatsapp->value;
        }
        if (!empty($qfacebook)) {
            $facebook = $qfacebook->value;
        }
        if (!empty($qinsragram)) {
            $insragram = $qinsragram->value;
        }
        if (!empty($qlinkedin)) {
            $linkedin = $qlinkedin->value;
        }
        if (!empty($qaddress_district)) {
            $address_district = $qaddress_district->value;
        }
        if (!empty($qaddress_street)) {
            $address_street = $qaddress_street->value;
        }
        if (!empty($qaddress_lat)) {
            $address_lat = $qaddress_lat->value;
        }
        if (!empty($qaddress_lng)) {
            $address_lng = $qaddress_lng->value;
        }
        if (!empty($qgtag)) {
            $gtag = $qgtag->value;
        }
        

        $article     = Articles::select("*", DB::raw("updated_at AS publish_at "))->orderBy("updated_at","desc")->limit(4)->get();
        $tarticle     = Articles::count();
    	$articlemore = false;
    	if ($tarticle > 4) {
    		$articlemore = true;
    	}
        return view('landing.main',compact('appname','email','phone','whatsapp','facebook','instagram','linkedin','address_district','address_street','article','articlemore','address_lng','address_lat','gtag')); 
    }



    public function article(Request $request)
    {   
        $id = $request->route('id');
        $article = Articles::select('*')->where('url_key', $id)->first();
        if (empty($article)){
            abort(404);
        }


        $app = Settings::whereIn('name', [
            'name',
            'email',
            'phone',
            'whatsapp',
            'facebook',
            'instagram',
            'linkedin',
            'address_district',
            'address_street',
            'address_lat',
            'address_lng',
            'google_analytic_tag'
        ])->pluck('value', 'name');

        return view('landing.article',compact('app','article')); 
    }
   
    public function soon()
    {   
        return view('landing.soon'); 
    }


}