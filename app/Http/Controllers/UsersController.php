<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use Cache;
use App\User;
use App\role;
use App\IdentificaitonType;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all users for listing
        $users = User::all();
        return view('users.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = IdentificaitonType::all();
        $roles = Role::all();
        return view('users.create', compact('types', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();


        $new_user                           = new User();
        $new_user->first_name               = $form_data['name'] ;
        $new_user->last_name                = $form_data['last_name'];
        $new_user->username                 = $form_data['username'];
        $new_user->date_of_birth            = $form_data['date_of_birth'];
        $new_user->identification_type_id   = $form_data['identification_type_id'];
        $new_user->id_number                = $form_data['id_number'];
        $new_user->passport_number          = null;
        $new_user->email                    = $form_data['email'];
        $new_user->role_id                  = $form_data['role_id'];
        $new_user->save();

        // ToDo: send email to user

        return redirect('/users')->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * 
     */
    public function doLogin()
    {
        $username = request()->get('username');
        $password = request()->get('password');

        $input_data  = ['username' => $username, 'password' => $password];

        if(Auth::attempt($input_data))
        {
            $role = Role::find(Auth::user()->role_id);
            if($role->id == 'Gurdian')
            {
                return redirect('/Portal');
            }
            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('error', 'Incorrect login detials, try again');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Cache::flush();

        return redirect('/login');
    }

    public function verifyAccount($id)
    {
        $user = User::find($id);
        return view('users.verify-account', compact('user'));
    }

    public function updateAccount($id)
    {
        $form_data = \request()->all();
        $user = User::find($id);
        $user->password = Hash::make($form_data['password']);
        $user->save();

        return redirect('/login');
    }
}
