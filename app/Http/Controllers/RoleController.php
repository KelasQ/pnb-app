<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // $roles = Role::when($request->name, function($query, $name){
        //     return $query->where('name', 'like', "%{$name}%");
        // })->orderBy('id','DESC')->paginate(20);
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('role.index', [
            'title'     =>  'Data Role',
            'roles'     =>  compact('roles')
        ]);
    }

    public function create()
    {
        return view('role.create', ['title' => 'Tambah Data Role']);
    }

    public function store(Request $request)
    {
        $request->validate(['role'  =>  ['required']]);
        Role::create($request->all());
        return redirect(route('role'))->with('success', 'Data Role Berhasil Disimpan.');
    }

    public function edit(Request $request, Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nama_field' => 'required'
        ]);

        $role->update($validated);

        return redirect(route('role.index'))
            ->with('status', 'success')
            ->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'))
            ->with('status', 'success')
            ->with('message', 'Data deleted');
    }
}
