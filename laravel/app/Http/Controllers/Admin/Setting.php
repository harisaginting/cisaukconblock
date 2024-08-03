<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Helpers\Harisa;

class Setting extends Controller
{

    protected $setting;
    protected $r;

    public function __construct(
        Settings $setting,
        Request $r
    ) {
        $this->setting = $setting;
        $this->r       = $r;
    }

    public function index()
    {
        $setting = array();
        $allsettings = Settings::all();
        foreach ($allsettings as $key => $value) {
            $val = json_decode($value, true);
            switch ($val['name']) {
                case 'name':
                    $setting['name'] = $value['value'];
                    break;
                case 'email':
                    $setting['email'] = $value['value'];
                    break;
                case 'phone':
                    $setting['phone'] = $value['value'];
                    break;
                case 'whatsapp':
                    $setting['whatsapp'] = $value['value'];
                    break;
                case 'linkedin':
                    $setting['linkedin'] = $value['value'];
                    break;
                case 'facebook':
                    $setting['facebook'] = $value['value'];
                    break;
                case 'instagram':
                    $setting['instagram'] = $value['value'];
                    break;
                case 'address_street':
                    $setting['address_street'] = $value['value'];
                    break;
                case 'address_district':
                    $setting['address_district'] = $value['value'];
                    break;
                case 'address_lat':
                    $setting['address_lat'] = $value['value'];
                    break;
                case 'address_lng':
                    $setting['address_lng'] = $value['value'];
                    break;
                case 'google_analytic_tag':
                    $setting['google_analytic_tag'] = $value['value'];
                    break;
                default:
                    break;
            }
        }
        return view('admin.setting', compact('setting'));
    }

    public function update()
    {
        $postData   = $this->r->post();
        $data       = array();
        foreach ($postData as $key => $value) {
            $data[$value["name"]] = $value["value"];
        }

        if (!empty($data["name"])) {
            if ($data["name"] != "") {
                $name = Settings::where('name', 'name')->first();
                $name->value = $data["name"];
                $name->save();
            }
        }

        if (!empty($data["email"])) {
            if ($data["email"] != "") {
                $email = Settings::where('name', 'email')->first();
                $email->value = $data["email"];
                $email->save();
            }
        }

        if (!empty($data["phone"])) {
            if ($data["phone"] != "") {
                $phone = Settings::where('name', 'phone')->first();
                $phone->value = $data["phone"];
                $phone->save();
            }
        }

        if (!empty($data["whatsapp"])) {
            if ($data["whatsapp"] != "") {
                $whatsapp = Settings::where('name', 'whatsapp')->first();
                $whatsapp->value = $data["whatsapp"];
                $whatsapp->save();
            }
        }

        if (!empty($data["linkedin"])) {
                $linkedin = Settings::where('name', 'linkedin')->first();
                $linkedin->value = $data["linkedin"];
                $linkedin->save();
        }else{
            $linkedin = Settings::where('name', 'linkedin')->first();
            $linkedin->value = "";
            $linkedin->save();
        }

        if (!empty($data["facebook"])) {
            if ($data["facebook"] != "") {
                $facebook = Settings::where('name', 'facebook')->first();
                $facebook->value = $data["facebook"];
                $facebook->save();
            }
        }else{
            $facebook = Settings::where('name', 'facebook')->first();
            $facebook->value = "";
            $facebook->save();
        }

        if (isset($data["instagram"])) {
                $instagram = Settings::where('name', 'instagram')->first();
                $instagram->value = $data["instagram"];
                $instagram->save();
        }else{
                $instagram = Settings::where('name', 'instagram')->first();
                $instagram->value = "";
                $instagram->save();
        }

        if (!empty($data["address_street"])) {
            if ($data["address_street"] != "") {
                $address_street = Settings::where('name', 'address_street')->first();
                $address_street->value = $data["address_street"];
                $address_street->save();
            }
        }

        if (!empty($data["address_district"])) {
            if ($data["address_district"] != "") {
                $address_district = Settings::where('name', 'address_district')->first();
                $address_district->value = $data["address_district"];
                $address_district->save();
            }
        }
        
        if (!empty($data["address_lat"])) {
            if ($data["address_lat"] != "") {
                $address_district = Settings::where('name', 'address_lat')->first();
                $address_district->value = $data["address_lat"];
                $address_district->save();
            }
        }
        
        if (!empty($data["address_lng"])) {
            if ($data["address_lng"] != "") {
                $address_district = Settings::where('name', 'address_lng')->first();
                $address_district->value = $data["address_lng"];
                $address_district->save();
            }
        }

        if (!empty($data["google_analytic_tag"])) {
            if ($data["google_analytic_tag"] != "") {
                $address_district = Settings::where('name', 'google_analytic_tag')->first();
                $address_district->value = $data["google_analytic_tag"];
                $address_district->save();
            }
        }

        $allsettings = Settings::get();
        return Harisa::apiResponse(200, $allsettings, 'sucess');
    }
}
