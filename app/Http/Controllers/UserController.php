<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function showAll(Request $request) {

        return response()->json(User::all());
    }

    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'  => 'required',
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }    

    public function show(Request $request, $id = '') {

        $user = User::find($id);

        return response()->json($user, 200);
    }

    public function update(Request $request, $id) {

        $user = User::find($id)
                ->update($request->all());

        return response()->json($user);
    }
}
