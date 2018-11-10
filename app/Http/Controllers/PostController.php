<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show the add post page
        $title = 'Add Post';
        return view('AddPost')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //collect user data and validate it
        //send the validate data to store method
        $data = $request->all();
        //set validation rules
            $validatedData = $request->validate([
                "name"     => "required|min:5",
                "email"  => "required",
                "title"  => "required|min:5",
                "body"  => "required|min:5|max:500"
                ]);

            DB::beginTransaction();
            try{
                $process_store = self::store($data);
                if($process_store){ 
                    //return home
                    return redirect()->route('home')->with('status', 'Add Post Successfully');
                }else{
                    //send back an error message
                    return redirect()->back()->withInput()->with('status', 'Unable to Add Post at This Time');
                }
               DB::commit(); 
            }catch(Exception $e){
                   throw $e;
                   DB::rollback(); 
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data);
    {
        //Create a new post model
        $add_post = new Post();
        $add_post->name = $data['name'];
        $add_post->email = $data['email'];
        $add_post->title = $data['title'];
        $add_post->body = $data['body'];
        $add_post->save();
        return $add_post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show a specfic post to edit
        $title = 'Edit Post';
        $post = Post::find($id);
        return view('edit_post')->with(['post' => $post, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //pull that particular post using it id
        //update it's content
        $data = $request->all();
        DB::beginTransaction();
        try{
            //find the post
            $edit_post = Post::find($id);
            if(!empty($data['name'])){
                $edit_post->name = $data['name'];
             }
             if(!empty($data['email'])){
                 $edit_post->email = $data['email'];   
             }
             if(!empty($data['title'])){
                 $edit_post->title = $data['title'];   
             }
             if(!empty($data['body'])){
                  $edit_post->body = $data['body'];  
             }
             if($edit_post->save()){
                DB::commit();
                return redirect()->route('home')->with('status', 'Edit Post Successfully');
             }else{
                 //send back an error message
                return redirect()->back()->withInput()->with('status', 'Unable to Edit Post at This Time');
             }

        }catch(Exception $e){
            throw $e;
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //pull the particular post and delete it
        $post_id = Post::destroy($id);
        if($post_id){
            return redirect()->route('home')->with('status', 'Post Deleted Successfully');
        }else{
           //send back an error message
                return redirect()->back()->with('status', 'Unable to Edit Post at This Time'); 
        }
    }
}
