$( document ).ready(function() {
    $('.add-video').click(function () {
        $('.add-video').prop('disabled', 'disabled');
        var videoUrl = $('.video-url').val();
        var urlData = urlParser.parse(videoUrl);
        if (urlData === undefined) {
            alert('Hibás Youtube URL!');
        } else {
            $.post( "/savevideo", {
                url: videoUrl,
                video_id: urlData.id,
                provider: urlData.provide
            }, function( resp ) {
                $('.listcontent').html(resp);
                $('.add-video').removeAttr('disabled');
            });
        }

        //$('.add-video').removeAttr('disabled');
    });
});

function removeVideo(videoId) {
    $.post( "/removevideo", {
        video_id: videoId
    }, function( resp ) {
        $('.listcontent').html(resp);
    });
}
function emptyQue() {
    $.post( "/empty", {}, function( resp ) {
        $('.listcontent').html(resp);
    });
}