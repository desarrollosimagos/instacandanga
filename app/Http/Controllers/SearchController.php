<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\twitter;
use App\facebook;
use App\google;
use App\instagram;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use DB;

class SearchController extends Controller
{
    public function autocomplete(){
	$term = Input::get('term');
	
	$results = array();
	
	$queries = DB::table('colectivos')
		->where('name', 'LIKE', '%'.$term.'%')
		->take(5)->get();
	
	foreach ($queries as $query)
	{
	    $results[] = [ 'id' => $query->id, 'value' => $query->name];
	}
return Response::json($results);
}

public function autocomplete2(){
	$term = Input::get('term');
	
	$results = array();
	
	$queries = DB::table('personas')
		->where('name', 'LIKE', '%'.$term.'%')
		->take(5)->get();
	
	foreach ($queries as $query)
	{
	    $results[] = [ 'id' => $query->id, 'value' => $query->name];
	}
	return Response::json($results);
}

public function incio(){
        $id = Auth::id();
        if($id)
			return redirect('/home');
        return view('welcome');
    }
    
}
