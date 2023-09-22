<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::when($request->name, function($query, $name){
            return $query->where('name', 'like', "%{$name}%");
        })->orderBy('id','DESC')->paginate(20);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_field' => 'required'
        ]);

        Role::create($validated);

        return redirect(route('role.index'))
            ->with('status' ,'success')
            ->with('message', 'Data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nama_field' => 'required'
        ]);

        $role->update($validated);

        return redirect(route('role.index'))
            ->with('status' ,'success')
            ->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();        
        return redirect(route('role.index'))
            ->with('status' ,'success')
            ->with('message', 'Data deleted');
    }
}
