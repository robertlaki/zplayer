@extends('layout.app')

@section('content')
    @if ($currentVideo)
        <script>
            var globalVideoId = '{!! $currentVideo->video_id !!}'
        </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Panel heading without title</div>
                    <div class="panel-body">
                        <div id="player" class="">
                            @if (!$currentVideo)
                                <div class="nothing-to-play">
                                    <span class="glyphicon glyphicon-ban-circle"></span> Nincs semmi a lejátszási listában :(
                                </div>
                            @endif
                            {{--<iframe class="embed-responsive-item" src="//www.youtube.com/embed/ePbKGoIGAXY?autoplay=1" frameborder="0" allowfullscreen></iframe>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form>
                    <div class = "input-group">
                        <input value="https://www.youtube.com/watch?v=GM-xUu3VRsU" placeholder="YouTube link http://....." type="text" class="video-url form-control" />
                        <span class="input-group-btn">
                            <button class="btn btn-success add-video" type="button">Hozzáadom</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-3">
                        <button class="action btn btn-warning" onclick="window.location.reload();" type="button">Törlöm listát <span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                    <div class="col-sm-3">
                        <button class="action btn btn-info" onclick="window.location.reload();" type="button">Következő <span class="glyphicon glyphicon-forward"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 listcontent">
                @include('partials.videolist', ['videoList' => $videoList])
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="http://www.youtube.com/player_api"></script>
@endsection
