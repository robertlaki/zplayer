var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
        height: '500',
        width: '718',
        videoId: globalVideoId,
        events: {
            onReady: onPlayerReady,
            onStateChange: onPlayerStateChange
        }
    });
}

// autoplay video
function onPlayerReady(event) {
    event.target.playVideo();
}

// when video ends
function onPlayerStateChange(event) {
    if(event.data === 0) {
        location.reload();
        //alert('done');
    }
}

