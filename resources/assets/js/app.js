$( document ).ready(function() {
    $('.add-video').click(function () {
        $('.add-video').prop('disabled', 'disabled');
        var videoUrl = $('.video-url').val();
        var urlData = urlParser.parse(videoUrl);
        if (urlData === undefined) {
            addMessage('danger');
            $('.add-video').removeAttr('disabled')
            $('.video-url').val('');
        } else {
            $.post( "/savevideo", {
                url: videoUrl,
                video_id: urlData.id,
                provider: urlData.provide
            }, function( resp ) {
                addMessage('success');
                $('.listcontent').html(resp);
                $('.add-video').removeAttr('disabled')
                $('.video-url').val('');
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

function addMessage(type) {
    var message = '<span class="glyphicon glyphicon-ok-circle"></span> Hozzáadtam a videót';
    if (type == 'danger') {
        message = '<span class="glyphicon glyphicon-remove-circle"></span> Sajnos valamiért nem sikerült hozzáadni a videót (pl.: hibás link)';
    }
    $("#result").html('<div class="alert alert-'+type+'"><button type="button" class="close">×</button>'+message+'</div>');
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);
    $('.alert .close').on("click", function(e){
        $(this).parent().fadeTo(500, 0).slideUp(500);
    });
}