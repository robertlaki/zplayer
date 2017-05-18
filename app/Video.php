<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'video_id', 'title', 'thumb', 'is_current',
    ];

    public static function createNewItem($data)
    {
        $current = self::create($data);
        $current->getVideoApiInfo();
    }

    public static function removeCurrent()
    {
        Video::where('is_current', '=', 1)->get()->each(function (Video $v, $key) {
            $v->delete();
        });
        return true;
    }

    public static function getCurrent($needNew = false)
    {
        if ($needNew) {
            self::removeCurrent();
            $current = Video::where('id', '=', Video::min('id'))->where('is_current', '=', 0)->first();
            if ($current) {
                $current->is_current = true;
                $current->save();
            }
            return $current;
        }
        return Video::where('is_current', '=', 1)->first();
    }

    public static function getNextVideo()
    {
        return Video::where('id', '=', Video::min('id'))->where('is_current', '=', 0)->first();
    }

    public static function getVideoQue()
    {
        return Video::where('is_current', '=', 0)->get();
    }

    public static function getVideoQueHtml()
    {
        return view('partials.videolist', ['videoList' => self::getVideoQue()]);
    }

    public function getVideoApiInfo()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => str_replace(['#VIDEO#', '#API#'], [$this->video_id, config('api.youtube.key')], config('api.youtube.url'))
        ));
        $videoJsonData = json_decode(curl_exec($curl));
        curl_close($curl);
        if (isset($videoJsonData->error)) {
            $this->title = 'nincs adat';
            $this->thumb = '';
        }
        else {
            $this->title = $videoJsonData->items[0]->snippet->title;
            $this->thumb = $videoJsonData->items[0]->snippet->thumbnails->default->url;
        }
        $this->save();
        return $videoJsonData;
    }

}
