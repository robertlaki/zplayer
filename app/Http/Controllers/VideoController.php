<?php

namespace App\Http\Controllers;

use App\Video;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function play()
    {
        $currentVideo = $video = Video::find(Video::min('id'));
        //$video->delete();
        dd($currentVideo);
        return view('home', compact('video'));
    }


    public function saveVideo()
    {

    }

    public function deleteVideo()
    {
        print "asdasd";
    }

}
