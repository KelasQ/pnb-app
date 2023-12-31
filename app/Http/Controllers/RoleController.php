<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // $roles = Role::when($request->name, function($query, $name){
        //     return $query->where('name', 'like', "%{$name}%");
        // })->orderBy('id','DESC')->paginate(20);
        return view('role.index', [
            'title'     =>  'Data Role',
            'roles'     =>  Role::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('role.create', [
            'role'      =>  new Role,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data Role'
        ]);
    }

    public function store(Request $request)
    {
        Role::create($request->validate(['role'  =>  'required|unique:roles,role']));
        return redirect(route('role.index'))->with('success', 'Data Role Berhasil Disimpan.');
    }

    public function edit(Role $role)
    {
        return view('role.edit', [
            'title'     =>  'Update Data Role',
            'submit'    =>  'Update',
            'role'      =>  $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->validate(['role'  =>  'required']));
        return redirect(route('role.index'))->with('success', 'Data Role Berhasil Diupdate.');
    }

    public function destroy(Role $role)
    {
        $check = User::where('role_id', $role->id)->count();
        if ($check === 0) {
            $role->delete();
            return redirect(route('role.index'))->with('success', 'Data Role Berhasil Dihapus.');
        }
        return redirect(route('role.index'))->with("warning", "Maaf, Data Tidak Dapat Dihapus! Data Role ($role->role) Masih Tersedia Pada Data Users!");
    }
}
