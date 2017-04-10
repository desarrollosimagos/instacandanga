<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\ActivationService;


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
    protected $redirectTo = '/home';
	
	protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
		$this->activationService = $activationService;
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
            'cedula' => 'required|max:255',
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
			'phone' => 'required|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'capacitar' => '',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if(!isset($data['capacitar']))
            $data['capacitar'] = '0';
        return User::create([
            'cedula' => $data['cedula'],
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
			'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'capacitar' => $data['capacitar'],
        ]);
    }
	
	public function register(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		
		$user = $this->create($request->all());

		$this->activationService->sendActivationMail($user);

		return redirect('/validate')->with('status', 'Enviamos un codigo de verificacion a su telefono. Ingreselo a continuacion');
	}
	
	public function activateUser($token, Request $request)
	{
        if(Auth::id){
            Auth::logout();
            //Session:flush();
        }
        if ($user = $this->activationService->activateUser($token)) {
            
            $request->session()->put('user_id',$user->id);
            if($user->capacitar)
                Auth::logout();//Session:flush();return view('exito')->with(array('id'=>$user->id));
            auth()->login($user);
			return redirect('/colectivos');
		}else{
            return redirect('/validate');
        }
		//abort(404);
	}
}
