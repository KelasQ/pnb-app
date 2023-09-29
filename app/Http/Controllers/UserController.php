<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        $request->validate([
            'role_id'      =>  'required',
            'nama'         =>  'required',
            'email'        =>  'required|email',
            'telp'         =>  'required',
            'foto'         =>  'image|mimes:jpeg,jpg,png|max:2048',
            'username'     =>  'required|min:5',
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

    public function profil()
    {
        return view('profil.index', ['title' => 'Detail Profil']);
    }

    public function editProfil(User $user)
    {
        return view('profil.edit-profil', [
            'title'   =>  'Update Profil',
            'user'    =>  $user
        ]);
    }

    public function updateProfil(Request $request, User $user)
    {
        $request->validate([
            'nama'         =>  'required',
            'email'        =>  'required|email',
            'telp'         =>  'required',
            'foto'         =>  'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('users/' . $user->foto);
            $request->file('foto')->store('users');
            $user->where('id', Auth::user()->id)
                ->update([
                    'nama'      =>  $request->nama,
                    'email'     =>  $request->email,
                    'telp'      =>  $request->telp,
                    'foto'      =>  $request->foto->hashName()
                ]);
        } else {
            $user->where('id', Auth::user()->id)
                ->update([
                    'nama'      =>  $request->nama,
                    'email'     =>  $request->email,
                    'telp'      =>  $request->telp
                ]);
        }
        return redirect(route('profil'))->with('success', 'Data Profil Berhasil Diupdate.');
    }

    public function editPassword(User $user)
    {
        return view('profil.edit-password', [
            'title'   =>  'Update Password',
            'user'    =>  $user
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password'              =>  'required|min:5',
            'password_confirmation' =>  'required|min:5|same:password'
        ]);

        $user->where('id', Auth::user()->id)
            ->update([
                'password'      =>  Hash::make($request->password)
            ]);

        return redirect(route('profil'))->with('success', 'Password Berhasil Diupdate.');
    }
}
