<?php
namespace App\Http\Controllers\Auth;
use App\usersignup;
use Illuminate\Http\Request;
use Hash;
use DB;
use Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Socialize;

class LoginAuth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
    	$username = $request->input('email');
    	$password = $request->input('password');
      
        $userValues = DB::table('login')->where('email', $username)->first();//value('pass');
        $userpass = $userValues->pass;
        if ($password==$userpass){
        	$request->session()->put('user', $userValues);
        	return redirect('add');}
         }

        

        public function create(Request $request)
        {   Log::info("reach here1");
            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
                'password_confirmation'=>'required|min:6',
                'email' => 'unique:login,email|email|required',//'exists:states,abbreviation'
                'name'  => 'required|min:2'
                ]);
            Log::info("reach here2");
            $signup = new usersignup;
            $signup->uname = $request->input('name');
            $signup->email = $request->input('email');
            $signup->pass = $request->input('password');
            $signup->save();
            return redirect('/');
        }


        

        public function facebook_redirect() {
            return Socialize::driver('facebook')->redirect();
            
        }
        // to get authenticate user data
        public function facebook(Request $request) {
            $user = Socialize::driver('facebook')->user();
            $userObj = $this->socialAuth($user);
            $request->session()->put('user', $userObj);
            Log::info("login successfully");
            return redirect('add');
        }

        public function google_redirect() {
            return Socialize::driver('google')->scopes(['email'])->redirect();
            
        }
        // to get authenticate user data
        public function google(Request $request) {
            $user = Socialize::driver('google')->user();
            $userObj = $this->socialAuth($user);
            $request->session()->put('user', $userObj);
            return redirect('add');
        }

        public function socialAuth($user)
        {
            $userValues = DB::table('login')->where('email', $user->getEmail())->first();
            
            if (empty($userValues)) {
                $signup = new usersignup;
                $signup->uname = $user->getName();
                $signup->email = $user->getEmail();
                $signup->remember_token = $user->token;
                $signup->save();

                $userValues = DB::table('login')->where('email', $user->getEmail())->first();
                return $userValues;
            }
            return $userValues;
        }


  }
