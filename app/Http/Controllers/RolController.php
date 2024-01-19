<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-rol',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]);   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('roles.index', ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::get();
        return view('roles.crear', ['permission'=>$permission]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre'=>'required | unique:roles,name' , 'permission'=> 'required']);

        $role= Role::create(['name'=> $request->input('nombre')]);       
        ///$role->syncPermissions($request->input('permission'));
        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('roles.index');
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
    public function edit(string $id)
    {
        $role= Role::find($id);
        $permission= Permission::get();
        $rolPermission= DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();

        return view('roles.editar', ['role'=>$role, 'permission'=>$permission, 'rolPermission'=>$rolPermission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['name'=>'required', 'permission'=> 'required']);

        $role= Role::find($id);
        $role->name= $request->input('name');
        $role->save();

        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
