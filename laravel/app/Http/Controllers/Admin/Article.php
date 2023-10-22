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
        Articles $article,
        Request $r
    )
    {
        $this->article = $article;
        $this->r       = $r;
    }



    public function index()
    {   
        return view('admin.article.index'); 
    }
    
    public function add()
    {   
        return view('admin.article.add'); 
    }

    public function list(Request $request){
        $length         = $request->input('length');
        $start          = $request->input('start');
        $searchValue    = !empty($_POST['search']['value']) ? trim(strtoupper($_POST['search']['value'])) : null;
        $orderColumn    = $request->input('order')['0']['column'];
        $orderDir       = $request->input('order')['0']['dir'];
        $order          = $request->input('order');
        
        $sektor         = $request->input('sektor');

        $output         = $this->article->getDatatable($length, $start, $searchValue, $orderColumn, $orderDir, $order, $sektor);  
        $output['draw'] = $request->input('draw');

        echo json_encode($output); 
    }
   
    public function process()
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