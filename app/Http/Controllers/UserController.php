<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(UserRequest $request)
    {
        return User::create($request->validated());
    }


    public function show(User $id)
    {
        return $id;
    }


    public function update(Request $request, User $id)
    {
        $id->update($request->all());

        return $id;
    }


    public function destroy(User $id)
    {
        $id->delete();
        return $id;
    }

    public function search($name)
    {
        return User::where('name', 'like', '%'.$name.'%')->get();
    }
}
