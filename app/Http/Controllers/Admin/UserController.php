<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        return Laratables::recordsOf(User::class);
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.user.show');
    }


    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
