<?php

namespace App\Http\Controllers;

use App\Models\UserModel;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
        $user = new UserModel;
        $user->name = 'BC';
        $user->email = 'mustofa@gmail.com';
        $user->save();
        return response()->json($user);
    }

    public function create(Request $request)
    {
        # code...
    }

    //
}
