<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\twitter;
use App\facebook;
use App\google;
use App\instagram;
use App\User;
use Socialite;
use Illuminate\Support\Facades\Auth;
use DB;

class InstagramRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrar');
    }

    public function instagram(){
        $id = Auth::id();
        $instagram = DB::table('instagram')
			->distinct()
			->where('instagram.user_id',$id)
			->get();
        return view('instagram')
			->with(array('instagram'=>$instagram));
    }


    protected $redirectPath = '/home';

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */

    public function redirectToProviderInstagram()
    {
        \Session::flash('type', 'register');
        return Socialite::driver('instagram')->redirect();
    }

    public function redirectToProviderInstagramLogin()
    {
        \Session::flash('type', 'login');
        return Socialite::driver('instagram')->redirect();
    }


    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */

    public function handleProviderCallbackInstagram()
    {
        $type = session('type');
        //echo var_dump($type);
        //exit;
        try {
            $user = Socialite::driver('instagram')->user();
        } catch (Exception $e) {
            return redirect('auth/instagram');
        }

        $authUser = $this->findOrCreateUser('instagram',$user);

        //Auth::login($authUser, true);
        if(!$authUser){
            //$type = session('type');
            if($type == 'login'){
               //Auth::login($authUser, true);
               $user_count = DB::table('users')->where('instagram_id', $user->id)->first();
               
               Auth::loginUsingId($user_count->id);

               //echo var_dump($user_count);
               //exit;
            }
            if($type == 'register'){
                \Session::flash('error', 'La cuenta con la que se desea registrarse ya esta asociada a un usuario. Intente con otra cuenta.');   
            }
        }else{
            if($authUser->id > 0){
                \Session::flash('instagram_id', $authUser->instagram_id);
                \Session::flash('name', $authUser->name);
                \Session::flash('handle', $authUser->handle);
                \Session::flash('avatar', $authUser->avatar);

            }else{
                \Session::flash('error', 'No se pudo registrar su cuenta de Instagram. Intentelo nuevamente.');
            }
        }
        
        
        return redirect('register');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($driver,$socialUser)
    {
        if($driver == 'instagram'){

            $authUser = instagram::where('instagram_id', $socialUser->id)->first();
            $id = Auth::id();
            if ($authUser){
                return $authUser;
            }
            
            return instagram::create([
                'name' => $socialUser->name,
                'handle' => $socialUser->nickname,
                'instagram_id' => $socialUser->id,
                'avatar' => $socialUser->avatar,
                'user_id' => $id,
            ]);
        }

        
    }


    
}
