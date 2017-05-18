<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

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
        $currentVideo = Video::getCurrent(true);
        $videoList = Video::getVideoQue();
        return view('home', compact('currentVideo', 'videoList'));
    }


    public function saveVideo(Request $request)
    {
        Video::createNewItem($request->toArray());
        return Video::getVideoQueHtml();
    }

    public function removeVideo(Request $request)
    {
        $video = Video::find($request->video_id);
        if ($video) {
            $video->delete();
        }
        return Video::getVideoQueHtml();
    }

    public function emptyQue()
    {
        Video::query()->truncate();
        return Video::getVideoQueHtml();
    }

}
