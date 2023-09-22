<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index', [
            'title'     =>  'Data Users',
            'users'     =>  User::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('user.create', [
            'role'      =>  new User,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data User'
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
