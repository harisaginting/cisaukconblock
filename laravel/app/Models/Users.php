<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $guarded = [];
    protected $table = 'users';

    function getUserByUsername($username, $password = null, $isDeleted = null){
    $select = array(
                        'a.*'
                      );
      if(!empty($password)){
        array_push($select, 'password');
      }  

      $user = DB::table('users as a')->select($select);
      $user->where(function($u) use ($username) {
            $u->orWhere('a.username','=',$username);
      });
      $result = $user->first();
      return $result;
    }
}
 