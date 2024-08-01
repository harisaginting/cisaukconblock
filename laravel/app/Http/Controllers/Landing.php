<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;
use App\Helpers\Harisa;

class Landing extends Controller
{

    public function index()
    {   
        $appname = "";
        $email = $phone = "";
        $whatsapp = $facebook = "";
        $instagram = $linkedin = "";
        $address_district = $address_street = "";

        $qappname = Settings::select('value')->where('name', 'name')->first();
        $qemail = Settings::select('value')->where('name', 'email')->first();
        $qphone = Settings::select('value')->where('name', 'phone')->first();
        $qwhatsapp = Settings::select('value')->where('name', 'whatsapp')->first();
        $qfacebook = Settings::select('value')->where('name', 'facebook')->first();
        $qinsragram = Settings::select('value')->where('name', 'insragram')->first();
        $qlinkedin = Settings::select('value')->where('name', 'linkedin')->first();
        $qaddress_district = Settings::select('value')->where('name', 'address_district')->first();
        $qaddress_street = Settings::select('value')->where('name', 'address_street')->first();
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

        


        $article     = Articles::select("*", DB::raw("updated_at AS publish_at "))->orderBy("updated_at","desc")->limit(4)->get();
        $tarticle     = Articles::count();
    	$articlemore = false;
    	if ($tarticle > 4) {
    		$articlemore = true;
    	}
        return view('landing.main',compact('appname','email','phone','whatsapp','facebook','instagram','linkedin','address_district','address_street','article','articlemore')); 
    }
   
    public function soon()
    {   
        return view('landing.soon'); 
    }


}