<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole
{
    public function get_role(){
        $rolelist = DB::table('roles')->get();
        return $rolelist;
    }
}
