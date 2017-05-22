@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <br/>
                <h2>Z-Player - Hozzáadás / Lejátszási lista</h2>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form>
                    <div class = "input-group">
                        <input placeholder="YouTube link pl.: https://www.youtube.com/watch?v=GM-xUu3VRsU" type="text" class="video-url form-control" />
                        <span class="input-group-btn">
                            <button class="btn btn-success add-video" type="button">Hozzáadom</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <center><div id="result"></div></center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                    <div class="text-center">
                        <button class="action btn btn-warning" onclick="window.location.reload();" type="button">Törlöm listát <span class="glyphicon glyphicon-remove"></span></button>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 listcontent">
                @include('partials.videolist', ['videoList' => $videoList, 'withCurrent' => $withCurrent])
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="http://www.youtube.com/player_api"></script>
@endsection
