<?php

namespace App\Http\Controllers\Auth;

use App\Hardware;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
            'username'      => $data['name'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
            'ip_address'    => request()->ip(),
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     */
    protected function registered(Request $request, $user) {
        if (!auth()->check()) {
            abort(404); // TODO: Error
        }

        $server = $user->servers()->create([
            'password'   => Str::random(6),
            'ip_address' => generate_ip(),
        ]);

        Hardware::create([
            'server_id' => $server->id
        ]);

        $user->network()->create([
            'speed' => 1
        ]);
    }
}
