<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function index(){
        $post = DB::table('posts')->get();
        echo json_encode($post);
    }
    function detail($id){
        $post = DB::table('posts')->where("id",$id)->get();
        return $post;
    }
    function store(Request $request){
        $title = $request->input('title');
        $author = $request->input('author');
        $description = $request->input('description');
      
         DB::table("posts")->insert([
             'title'=>$title,
              'author'=>$author,
              'description'=>$description
              ]);
              $responseData = array("data"=>null);
              return response()->json($responseData, 200);        
    }

}
