<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Role::create(['name' => 'writer']);
        //Permission::create(['name' => 'write post']);
        //relacionar permiso y rol
        /*$role = Role::findById(1);
        $permission = Permission::findById(1);
        $role->givePermissionTo($permission);*/

        // rol de escribir (1) con permiso de editar post
        /*$permission = Permission::create(['name' => 'edit post']);
        $role = Role::findById(1);
        $role->givePermissionTo($permission);*/

        //remover rol 1 (escribir) del permiso 2 (editar post)
        $role = Role::findById(1);
        $permission = Permission::findById(2);
        $permission->removeRole($role);
       
        return view('home');
    }
}
