<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index() {
        return view('auth.login');
    }


    public function dashboard() {

        if (Auth::check()) {
          //  $users= Auth::user();
            $users= User::all();
            return view('dashboard', compact('users'));
        }

        return redirect("login")->with('error', 'You are not allowed to access');
    }

    public function customLogin(Request $request) {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && $user->password === md5($request->password)) {
            // Login the user
            Auth::login($user, true);
            return redirect()->to('/dashboard');
        }

        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->with('error', $validator);
    }


    public function registration() {
        $countries = Country::all();
        return view('auth.registration', compact('countries'));
    }

    public function customRegistration(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $data = $request->all();
        $this->create($data);

        Mail::to($data['email'])->send(new RegistrationEmail($data));

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city']
        ]);
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
