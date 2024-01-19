<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.index', ['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles= Role::pluck('name', 'name')->all();
         return view('usuario.crear', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'rol'=>'required'
        ]);

        //$input= $request->all();
        //$user= User::create($input);
        //$user->assignRole($request->input('rol'));
        $users= new User();

        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= $request->password;
        $users->assignRole($request->rol);
    
        $users->save();

        return redirect()->route('usuarios.index');
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
        $user= User::find($id);
        $roles= Role::pluck('name', 'name')->all();
        $userRole= $user->roles->pluck('name', 'name')->all();
        //var_dump($roles);
        return view('usuario.editar', ['user'=>$user, 'roles'=>$roles, 'userRole'=>$userRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required | email | unique:users,email,'.$id,
            'rol'=>'required'
        ]);


        $user= User::find($id);

        $user->name= $request->name;
        $user->email= $request->email;
    
        if(!empty($request->password)){
          $user->password= $request->password;
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('rol'));
    
        $user->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('usuarios.index');
    }
}
