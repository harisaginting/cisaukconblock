<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Articles extends Model
{
    protected $guarded = [];
    protected $table = 'articles';

     function getDatatable($length, $start, $searchValue, $orderColumn, $orderDir, $order,$sektor = null){
        $query      = DB::table(sprintf("%s as a",$this->table))
                      ->select('a.*');
        $countAll   = $query->count();

        if(!empty($searchValue)){
            $query->where(function($q) use ($searchValue) {
                  $q->whereRaw("UPPER(a.url_key) like '%".$searchValue."%'")
                    ->orWhereRaw("UPPER(a.title) like '%".$searchValue."%'")
                    ->orWhereRaw("UPPER(a.short_description) like '%".$searchValue."%'");
              });

        } 

        $fieldTable = array('a.url_key','a.title','a.category','a.updated_at');
                
                // echo $orderColumn;die;
        if(!empty($fieldTable[$orderColumn])){
            $query->orderBy($fieldTable[1],$orderDir);
        }else{
            $query->orderBy('a.url_key','asc');
        }
        
        return array(
            "recordsTotal" => $countAll,
            "recordsFiltered" => $query->count(),
            "data" => $query->skip($start)->limit($length)->get(),
        );
    }
}
