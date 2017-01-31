<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;


class Admin extends Model
{


    public function userList()
    {

    }


    /**
     * Create New administrators.
     */
    public function newAdmin($request)
    {
        if ($request->firstname == '' || $request->lastname == '' || $request->email == '' || $request->password == '') {
            return 'Please fill all the required fields';
        } else {
            $email_exist = DB::table('users')
                ->where('email', $request->email)
                ->get();

            if (!empty($email_exist) && count($email_exist)) {
                return 'Email already registered';
            } else {
                DB::table('users')->insert([
                    'first_name' => $request->firstname,
                    'last_name'  => $request->lastname,
                    'name'       => $request->firstname . ' ' . $request->lastname,
                    'username'   => $request->email,
                    'email'      => $request->email,
                    'password'   => $request->password,
                    'ip'         => $request->ip(),
                    'role_id'    => $request->role,
                    'created_by' => session()->get('u_id'),
                    'company_id' => '1', //session()->get('u_companyid'),
                ]);

                return 'success';
            }
        }
    }


    // METHOD: UPDATE ADMIN BY ID
    public function updateAdminById($request) {
        $admin_result = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'name'       => $request->first_name . " " . $request->last_name,
                'email'      => $request->email,
                'status'     => $request->status,
            ]);


        return $admin_result;

    }
}
