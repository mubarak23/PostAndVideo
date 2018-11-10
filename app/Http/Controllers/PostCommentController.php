<?php

namespace App\Http\Controllers;

use App\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $validatedData = $request->validate([
                "email"  => "required",
                "comment"  => "required|min:5"
                ]);
          DB::beginTransaction();
            try{
                $process_comment = new PostComment();
                $process_comment->post_id = $data['post_id'];
                $process_comment->email = $data['email'];
                $process_comment->comment = $data['comment'];
                DB::commit();
                if($process_comment){ 
                    //return home
                    return redirect()->back()->with('status', 'Add Comment Successfully');
                }else{
                    //send back an error message
                    return redirect()->back()->withInput()->with('status', 'Unable to Add Comment at This Time');
                }
                
            }catch(Exception $e){
                   throw $e;
                   DB::rollback(); 
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post_id = PostComment::destroy($id);
        if($post_id){
            return redirect()->route('posts')->with('status', 'Comment Deleted Successfully');
        }else{
           //send back an error message
                return redirect()->back()->with('status', 'Unable to Delete Comment at This Time'); 
        }
    }
}
