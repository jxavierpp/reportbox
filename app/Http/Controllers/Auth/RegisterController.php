<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/adminpanel/profesores';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_dash'],
            'categoria' => ['required'],
        ]);
    }

    protected function index(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_dash'],
            'categoria' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    //    $usuario = new User();
    //    $usuario->name = $data['name'];
    //    $usuario->email = $data['email'];
    //    $usuario->password = Hash::make($data['password']);
    // //   $usuario->save();
    //    return back();

    //    $categoria = Category::find($request->categoria_id);

    //    $categoria = new Category();

        

        $usuario = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $users_id = User::where('id', '2')->get();

        $categoria = new Category();

        $categoria->encargado = $users_id;
        $categoria->save();

        return $usuario;
    }
}
