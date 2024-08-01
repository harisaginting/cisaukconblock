<?php namespace App\Helpers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Log;
use Auth;
use Cache;
use Carbon\Carbon;
use Session;
use Redirect;

class Harisa
{
    public static function apiResponse($status,$data,$message){
        return response()->json(['status'=>$status, 'data' => $data , 'message' => $message], $status);
    }

    public static function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen( base_path()."/../public/img/upload/".$output_file, 'wb' ); 
        // $data = explode( ',', $base64_string );
        // fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fwrite( $ifp, base64_decode( $base64_string  ) );
        fclose( $ifp ); 
        return $output_file; 
    }

    public static function getSettingByName($name){
        $value = "";
        $data = DB::table('settings')->whereRaw("UPPER(name) = '".strtoupper($name)."'")->orderBy('value','asc')->first();   
        if(!empty($data->id)){
            $value = $data->value;
        }
        return $value;

    }
}