<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index', [
            'title'     =>  'Data Users',
            'users'     =>  User::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('user.create', [
            'roles'       =>  Role::all(),
            'user'        =>  new User,
            'submit'      => 'Simpan',
            'title'       => 'Tambah Data User'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id'      =>  'required',
            'nama'         =>  'required',
            'email'        =>  'required|email|unique:users,email',
            'telp'         =>  'required',
            'foto'         =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'username'     =>  'required|min:5|unique:users,username',
            'password'     =>  'required|min:5',
        ]);

        //upload foto
        $request->file('foto')->store('users');

        User::create([
            'role_id'   =>  $request->role_id,
            'nama'      =>  $request->nama,
            'email'     =>  $request->email,
            'telp'      =>  $request->telp,
            'foto'      =>  $request->foto->hashName(),
            'username'  =>  $request->username,
            'password'  =>  Hash::make($request->password)
        ]);

        return redirect(route('user.index'))->with('success', 'Data User Berhasil Disimpan.');
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'title'   =>  'Update Data User',
            'submit'  =>  'Update',
            'roles'   =>  Role::all(),
            'user'    =>  $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->email === $user->email) $validasi = 'required|email';
        if ($request->username === $user->username) $validasi = 'required|min:5';
        $request->validate([
            'role_id'      =>  'required',
            'nama'         =>  'required',
            'email'        =>  $validasi,
            'telp'         =>  'required',
            'foto'         =>  'image|mimes:jpeg,jpg,png|max:2048',
            'username'     =>  $validasi,
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('users/' . $user->foto);
            $request->file('foto')->store('users');
            $user->update([
                'role_id'   =>  $request->role_id,
                'nama'      =>  $request->nama,
                'email'     =>  $request->email,
                'telp'      =>  $request->telp,
                'foto'      =>  $request->foto->hashName(),
                'username'  =>  $request->username,
            ]);
        } else {
            $user->update([
                'role_id'   =>  $request->role_id,
                'nama'      =>  $request->nama,
                'email'     =>  $request->email,
                'telp'      =>  $request->telp,
                'username'  =>  $request->username
            ]);
        }
        return redirect(route('user.index'))->with('success', 'Data User Berhasil Diupdate.');
    }

    public function destroy(User $user)
    {
        Storage::delete('users/' . $user->foto);
        $user->delete();
        return redirect(route('user.index'))->with('success', 'Data User Berhasil Dihapus.');
    }
}
