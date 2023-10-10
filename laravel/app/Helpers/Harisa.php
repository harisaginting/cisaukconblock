<?php namespace App\Helpers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
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
        $ifp = fopen( base_path()."/../public/img/".$output_file, 'wb' ); 
        // $data = explode( ',', $base64_string );
        // fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fwrite( $ifp, base64_decode( $base64_string  ) );
        fclose( $ifp ); 
        return $output_file; 
    }
}