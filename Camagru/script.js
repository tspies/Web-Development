(function(){
    var video = document.getElementById('video_stream'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        photo = document.getElementById('photo'),
        vendorURL = window.URL || window.webkitURL;

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;
    navigator.getMedia({
        video: true
    }, function(stream){
        video.src = vendorURL.createObjectURL(stream);
        video.play();
    }, function(error){

    });
})();