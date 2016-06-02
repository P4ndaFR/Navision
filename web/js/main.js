$(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.collapsible').collapsible(
        {
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
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
