<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messsages = array(
                'username.unique'=>'Username đã tồn tại!',
                'email.required'=>'Bạn phải nhập đầy đủ email',
                'name.required'=>'Bạn phải nhập đầy đủ tên',
                'email.unique' =>'Email đã tồn tại!'
         );

        $rules = array(
            'username'=>'required|max:255|unique:users',
            'email'=>'required|max:255|email|unique:users',
            'name'=>'required|max:255',
            'password'=>'required|min:6|confirmed'
         );


        return Validator::make($data,$rules,$messsages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' =>$data['username'],
            'sex'=>'',
            'birthday'=>'',
            'address'=>'',
            'slogan'=>''   
        ]);
    }
}
