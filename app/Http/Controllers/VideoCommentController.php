<?php

namespace App\Http\Controllers;

use App\VideoComment;
use Illuminate\Http\Request;

class VideoCommentController extends Controller
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
        //
        $data = $request->all();
        $validatedData = $request->validate([
                "email"  => "required",
                "comment"  => "required|min:5"
                ]);
          DB::beginTransaction();
            try{
                $process_comment = new VideoComment();
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
     * @param  \App\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function show(VideoComment $videoComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoComment $videoComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoComment $videoComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @author  Mubarak Aminu <mubarakaminu340@gmail.com>
     * @param  \App\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post_id = VideoComment::destroy($id);
        if($post_id){
            return redirect()->route('posts')->with('status', 'Comment Deleted Successfully');
        }else{
           //send back an error message
                return redirect()->back()->with('status', 'Unable to Delete Comment at This Time'); 
        }
    }
}
