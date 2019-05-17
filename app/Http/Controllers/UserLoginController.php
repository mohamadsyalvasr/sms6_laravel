<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    public function prosesLogin(Request $request){
        $user = DB::table('users')
        ->where('email', $request->email)
        ->where('password', $request->password)
        ->get();

        if (count($user)>0) {
            # code...
            foreach ($user as $admin) {
                # code...
                $result["success"] = "1";
                $result["namalengkap"] = $admin->name;
                $result["email"] = $admin->email;
                $result["id"] = $admin->id;
            }

            echo json_encode($result);

        } else {
            $result["success"] = "0";
            $result["message"] = "error";
            echo json_encode($result);
        }
    }
}
