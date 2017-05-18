<br/>
<br/>
<div class="jumbotron">
    @if (sizeof($videoList) > 0)
        <table class="table table-striped">
            @foreach ($videoList as $key => $video)
                <tr class="@if ($key == 0) success @elseif ($key == 1) info @endif">
                    <td align="center" valign="middle">
                        @if ($video->thumb != '')
                            <img src="{{ $video->thumb }}" title="{{ $video->title }}" /></td>
                    @else
                        <div class="small"><i>Nincs kép</i></div>
                    @endif
                    <td>
                        {{ $video->title }}@if ($key == 0) <span class="badge badge-success">mindjárt kezdődik</span> @elseif ($key == 1) <span class="badge badge-info">utána...</span> @endif
                        <div class="small"><a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></div>
                    </td>
                    <td align="center" valign="middle">
                        <button title="Törlés" class="btn btn-warning remove-video" onclick="removeVideo({{ $video->id }})"><span class="glyphicon glyphicon-remove"></span></button>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="nothing-to-play-list">
            <span class="glyphicon glyphicon-ban-circle"></span> Nincs semmi a lejátszási listában :(
        </div>
    @endif
</div>