<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function template(Request $request){

        $searchText= $request->input('search'); //cmt

        $date = Carbon::hasFormat($searchText, 'Y-m-d');

        $posts = DB::table('posts');

        if ($date){
            $posts->whereDate('created_at', $searchText);
        } else {
            $posts->where('title', 'LIKE', "%{$searchText}%")
            ->orWhere('content', 'LIKE', "%{$searchText}%");
        }

        $posts = $posts->paginate(10);

       return view('blog', ['posts' => $posts]);
   }

   public function portfolio(){
       $name = [
           'This is Portfolio',
           'This is Portfolio 1',
           'This is Portfolio 2'
       ];
       return view('portfolio' , ['name' =>$name]);
   }

}
