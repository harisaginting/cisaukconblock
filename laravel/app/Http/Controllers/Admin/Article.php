<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Articles;
use App\Helpers\Harisa;
use Session;
use Carbon\Carbon;

class Article extends Controller
{
    
    protected $article;
    protected $r;

    public function __construct
    (
        Users $article,
        Request $r
    )
    {
        $this->article = $article;
        $this->r       = $r;
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
        return view('admin.article.index'); 
    }
    
    public function add()
    {   
        return view('admin.article.add'); 
    }
   
    public function addProcess()
    {   
        $postData   = $this->r->post(); 
        $data       = array();
        foreach ($postData as $key => $value) {
             $data[$value["name"]] = $value["value"];
        } 
        $model  = new Articles;
        $model->title              = !empty($data["title"]) ? $data["title"] : null;
        $model->url_key            = !empty($data["url_key"]) ? strtolower(str_replace(" ", "", urldecode($data["url_key"]))) : strtolower(str_replace(" ", "", urldecode($data["title"]))).date('d-m-y');
        $model->category           = !empty($data["category"]) ? $data["category"] : null;
        $model->short_description  = !empty($data["short_description"]) ? $data["short_description"] : null;
        $model->content            = !empty($data["content-value"]) ? $data["content-value"] : null;
        $model->updated_at         = Carbon::now();
        $model->updated_by         = $this->r->user["uuid"];

        $imageDesktop = null;
        $imageMobile = null;
        
        if (!empty($data["upload-photo-result"])) {
            $imageBase64 = $data["upload-photo-result"];
            $imageDesktop = Harisa::base64_to_jpeg($imageBase64,"artikel-".strtolower(str_replace(" ", "", $data["url_key"]))."-desktop.png");
        }

        if (!empty($data["upload-photo-result-mobile"])) {
            $imageBase64 = $data["upload-photo-result-mobile"];
            $imageMobile = Harisa::base64_to_jpeg($imageBase64,"artikel-".strtolower(str_replace(" ", "", $data["url_key"]))."-mobile.png");
        }

        $model->image_desktop    = !empty($data["upload-photo-result"]) ? $imageDesktop : null;
        $model->image_mobile     = !empty($data["upload-photo-result-mobile"]) ? $imageMobile : null;
        

         if(!empty($data["id_artikel"])){
            $response =  $this->updateProcess($data["id_artikel"],$model);
         }else{
            $model->created_at         = Carbon::now();
            $model->save();
            $response = true;
         }
         if ($response){
            if(!empty($data["id_artikel"])){
                 return Harisa::apiResponse(200, Articles::whereId($data["id_artikel"])->get(), 'success');
             }else{
                return Harisa::apiResponse(200, Articles::whereId($model->id)->get(), 'success');
             }
         }else{
            return Harisa::apiResponse(401, null, 'not valid request' );
         }
    }


}