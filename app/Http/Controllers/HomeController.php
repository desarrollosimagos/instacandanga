<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\twitter;
use App\facebook;
use App\google;
use Socialite;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function facebook(){
        $id = Auth::id();
        $facebook = DB::table('facebook')
			->distinct()
			->where('facebook.user_id',$id)
			->get();
        return view('facebook')
			->with(array('facebook'=>$facebook));
    }

    public function twitter(){
        $id = Auth::id();
        $twitter = DB::table('twitters')
			->distinct()
			->where('twitters.user_id',$id)
			->get();
        return view('twitter')
			->with(array('twitter'=>$twitter));
    }

    public function carnet(){
        $id = Auth::id();
        $carnet = DB::table('carnet')
			->distinct()
			->where('carnet.user_id',$id)
			->get();
        if($carnet->count()==0)
            return view('carnet')->with(array('carnet'=>NULL));
        return view('carnet')
			->with(array('carnet'=>$carnet));
    }

    public function google(){
        $id = Auth::id();
        $google = DB::table('google')
			->distinct()
			->where('google.user_id',$id)
			->get();
        return view('google')
			->with(array('google'=>$google));
    }

    public function instagram(){
        return view('instagram'); 
    }


    protected $redirectPath = '/home';

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('twitter')->redirect();
    }

    public function redirectToProviderFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToProviderGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser('twitter',$user);

        //Auth::login($authUser, true);

        return redirect('twitter');
    }

    public function handleProviderCallbackFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser('facebook',$user);

        //Auth::login($authUser, true);

        return redirect('facebook');
    }

    public function handleProviderCallbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }

        $authUser = $this->findOrCreateUser('google',$user);

        //Auth::login($authUser, true);

        return redirect('google');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($driver,$socialUser)
    {
        if($driver == 'twitter'){
            $authUser = twitter::where('twitter_id', $socialUser->id)->first();
            $id = Auth::id();
            if ($authUser){
                return $authUser;
            }

            return twitter::create([
                'name' => $socialUser->name,
                'handle' => $socialUser->nickname,
                'twitter_id' => $socialUser->id,
                'avatar' => $socialUser->avatar_original,
                'user_id' => $id,
            ]);
        }

        if($driver == 'facebook'){
            $authUser = facebook::where('facebook_id', $socialUser->id)->first();
            $id = Auth::id();
            if ($authUser){
                return $authUser;
            }

            return facebook::create([
                'name' => $socialUser->name,
                'handle' => $socialUser->name,
                'facebook_id' => $socialUser->id,
                'avatar' => $socialUser->avatar_original,
                'user_id' => $id,
            ]);
        }

        if($driver == 'google'){
            $authUser = google::where('google_id', $socialUser->id)->first();
            $id = Auth::id();
            if ($authUser){
                return $authUser;
            }

            return google::create([
                'name' => $socialUser->name,
                'handle' => $socialUser->name,
                'google_id' => $socialUser->id,
                'avatar' => $socialUser->avatar_original,
                'user_id' => $id,
            ]);
        }

        
    }


    
}
