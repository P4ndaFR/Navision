$(document).ready(function(){
        $(".button-collapse").sideNav();
        $('#reader').html5_qrcode(function(data)
        {
            $('#read').html(data);
            //alert("success, link is :"+data);
            location.href = data;
        },
        function(error){
            $('#read_error').html(error);
        },
        function(videoError){
            $('#read_videoError').html(videoError);
        });
});
