<?php

namespace App\Http\Controllers;

use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Request;
use File;
use DB;
use app\VideoComment;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all post with pagination
        $title = "All Videos";
        $videos = Video::paginate(10);
        return view('videos')->with(['all_videos' => $videos, 'title' => $title ]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddVideo()
    {
        //show the add post page
        $title = 'Add Video';
        return view('AddVideo')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //collect user data and validate it
        //send the validate data to store method
        $data = $request->all();
        //return $request->file('video');
        //set validation rules
            $validatedData = $request->validate([
                "name"     => "required|min:5",
                "email"  => "required",
                "title"  => "required|min:5",
                "video"  => "required|min:5|max:500"
                ]);
            //process video to Storage Location
             
            if ($request->hasFile('video')) {
            $request->file('video');
            $filename = $request->image->getClientOriginalName();
            $filesize = $request->image->getClientSize();
            $request->image->storeAs('public/uploadVideo', $filename);

        }else{
            //send back an error message
                    return redirect()->back()->withInput()->with('status', 'Unable to Add Post at This Time');
        }

            DB::beginTransaction();
            try{
                $process_store = self::store($data, $filename);
                if($process_store){ 
                    //return home
                    return redirect()->route('home')->with('status', 'Add Video Successfully');
                }else{
                    //send back an error message
                    return redirect()->back()->withInput()->with('status', 'Unable to Add Video at This Time');
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
     * 
     * @return \Illuminate\Http\Response
     */
    public function store($data, $filename)
    {
        //Create a new post model
        $add_video = new Video();
        $add_video->name = $data['name'];
        $add_video->email = $data['email'];
        $add_video->title = $data['title'];
        $add_video->video_name = $filename;
        $add_video->save();
        return $add_video;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        //show details of single post
        $title = "Single Video Details";
        $video_details = video::find($id);
        //pull list of comment attarch to this post
        $video_comment = VideoComment::where('post_id', $id)->get();
        return view('single_details')->with(['title' => $title, 'video_details' => $video_details, 'comment' => $video_comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //show a specfic post to edit
        $title = 'Edit Video';
        $video = Video::find($id);
        return view('edit_video')->with(['video' => $video, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        //
    }
}
