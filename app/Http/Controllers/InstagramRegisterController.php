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

        return Socialite::driver('instagram')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */

    public function handleProviderCallbackInstagram()
    {
        try {
            $user = Socialite::driver('instagram')->user();
        } catch (Exception $e) {
            return redirect('auth/instagram');
        }

        $authUser = $this->findOrCreateUser('instagram',$user);

        //Auth::login($authUser, true);
        if(!$authUser){
            \Session::flash('error', 'La cuenta con la que se desea registrarse ya esta asociada a un usuario. Intente con otra cuenta.');
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
            //$id = Auth::id();
            if ($authUser){
                $existUser = User::where('instagram_id', $authUser->instagram_id)->first();

                if ($existUser)
                    return False;
                return $authUser;
            }
            return instagram::create([
                'name' => $socialUser->name,
                'handle' => $socialUser->nickname,
                'instagram_id' => $socialUser->id,
                'avatar' => $socialUser->avatar,
            ]);
        }

        
    }


    
}
