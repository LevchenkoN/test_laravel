<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Carbon;


class UserController1
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
       return view('components.chat');
    }

    public function signup(){
        return view('components.signup');
    }

    public function post(Request $request){

        $email = $request->email;
        $password = $request->password;
        if (empty($email) && empty($password)){
            return view('components.login');
        }
        $passwordHashed = hash("sha256", $password);
        $users = User::all();
        foreach ($users as $u) {
            if ($u->email == $email && $u->password == $passwordHashed) {
                $userAuth = $u;
                return view('components.chat', [
                    'user' => $userAuth,
                ]);
            }
        }
    }
}
