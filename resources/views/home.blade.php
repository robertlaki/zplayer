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
                <br/>
                <h2>Z-Player</h2>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    @if (!$currentVideo)
                        <div class="panel-heading">Nincs semmi a lejátszási listában :(</div>
                    @else
                        <div class="panel-heading">Ezt játszuk: <b>{{ $currentVideo->title }}</b> <a target="_blank" class="small" href="{{ $currentVideo->url }}">{{ $currentVideo->url }}</a></div>
                    @endif
                    <div class="panel-body">
                        <div id="player" class="">
                            @if (!$currentVideo)
                                <div class="nothing-to-play">
                                    <span class="glyphicon glyphicon-ban-circle"></span> Nincs semmi a lejátszási listában :(
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
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
                @include('partials.videolist', ['videoList' => $videoList, 'withCurrent' => false])
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="http://www.youtube.com/player_api"></script>
@endsection
