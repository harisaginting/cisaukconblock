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
            $val = json_decode($value,true);
            switch ($val['name']) {
            case 'name':
                $setting['name'] = $value['value'];
                break;
            case 'whatsapp':
                $setting['whatsapp'] = $value['value'];
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
            $name = Settings::where('name', 'name')->first();
            $name->value = $data["name"];
            $name->save();
        }

        if (!empty($data["whatsapp"])) {

            $whatsapp = Settings::where('name', 'whatsapp')->first();
            $whatsapp->value = $data["whatsapp"];
            $whatsapp->save();
        }
        $allsettings = Settings::get();
        return Harisa::apiResponse(200, $allsettings, 'sucess');
    }
}
