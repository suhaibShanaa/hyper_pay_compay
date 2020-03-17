<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        //To Create Rolles
//        Role::create(['name'=>'admin']);
//        Role::create(['name'=>'moderator']);
//        Role::create(['name'=>'guest']);

        //To Create Permisssions
//        Permission::create(['name' => 'Add Customer']);
//        Permission::create(['name' => 'Edit Customer');
//        Permission::create(['name' => 'View Customer']);
//        Permission::create(['name' => 'Delete Customer']);
//        Permission::create(['name' => 'Add Company']);
//        Permission::create(['name' => 'Edit Company']);
//        Permission::create(['name' => 'View Company']);
//        Permission::create(['name' => 'Delete Company']);

//        $role =Role::findById(1or2or3);
//        $permission = Permission::findById(1);
//        $permission = Permission::findById(2);
//        $permission = Permission::findById(3);
//        $permission = Permission::findById(4);
//        $permission = Permission::findById(5);
//        $permission = Permission::findById(6);
//        $permission = Permission::findById(7);
//        $permission = Permission::findById(8);
//        $role->givePermissionTo($permission);

//        to Assign Admin
//        auth()->user()->givePermissionTo(['Add Customer' ,'Edit Customer' ,'View Customer'
//          ,'Delete Customer' , 'Add Company' ,'Edit Company' , 'View Company' ,'Delete Company' ]);
//        auth()->user()->assignRole('admin');
//
//        //to Assign Moderator
//        auth()->user()->givePermissionTo(['Edit Customer' ,'View Customer' ,'Edit Company' , 'View Company' ]);
//        auth()->user()->assignRole('moderator');
//
//        //to Assign Guest
//        auth()->user()->givePermissionTo(['View Customer','View Company']);
//        auth()->user()->assignRole('guest');

//        return auth()->user()->getAllPermissions();
//
        //to Check
//        return User::permission('Add Customer')->get();
        return view('home');




    }
}
