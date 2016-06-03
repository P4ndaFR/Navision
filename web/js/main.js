$(document).ready(function(){
        //SideNav menu principal
        $(".button-collapse").sideNav();

        //Collapslide POI
        $('.collapsible').collapsible(
        {
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
        //Code reader
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