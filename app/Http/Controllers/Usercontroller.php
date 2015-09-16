<?php

namespace App\Http\Controllers;
use DB;
use URL;
use Hash;
use App\UserModel;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
/**
* Show all of the users for the application.
*
* @return Response
*/
public function index()
{
	$users = UserModel::all();
	return $users; 


}

public function allUsers()
{
	$users = DB::table('users')->paginate(10);

	return view('user.userProfile', ['users' => $users]);

}

public function submit(Request $request)
{
	$this->validate($request, [
		'password' => 'required|min:6|confirmed',
		'name' => 'required|min:1',
		'email' => 'unique:users|email|required',
		'password_confirmation'=>'required|min:6',
		]);

	$name = $request->input('name');
	$email = $request->input('email');
	$role = $request->input('role');
    $role = UserController::updateRole($role);//Replacing Role with ID
	$pass = Hash::make($request->input('password')); 
	
    $id = DB::table('users')->insertGetId(
		['name' => $name, 
		'email'=> $email,
		'pass' => $pass,
		'role' => $role,
		'image' =>'../public/images/default.jpg' ]
		);

	if($id)
		return trans('messages.signup');
	else
		return trans('messages.fail');
}

public function updateRole($role)
{
	$id = DB::table('roles')->where('role', $role)->value('id');
	return $id;
}

public function url(Request $request)
{
	$uri = $request->path();
	echo $uri;
}



}