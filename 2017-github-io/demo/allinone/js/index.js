var toper = $('#scroll-top');

$(window).scroll(function () {
    if ($(window).scrollTop() <= 100) {
        toper.hide();
    } else {
        toper.show();
    }
});

toper.click(function () {
    $(window).scrollTop(0);
});

$('#btn-login').click(
    function () {

        $('#loginfloat').show(200);
        y=document.documentElement.clientHeight/2-200;
        x=document.documentElement.clientWidth/2-200;
        $('#loginfloat').css({top:y+'px',left:x+'px'});
    }
)

$('.login_drag').mouseenter(function(){
    $('#loginfloat').one("mousedown",function(event){
        deltaX=event.clientX-$(this).offset().left;
        deltaY=event.clientY-$(this).offset().top;
        $(document).bind("mousemove",function(event){
            $('#loginfloat').css({
                "left":(event.clientX-deltaX)+"px",
                "top":(event.clientY-deltaY)+"px"
            })
            return false;
        });
        $(document).bind("mouseup",function(){
            $(document).unbind("mousemove");
            $(document).unbind("mouseup");
        });
        return false;
    });
});
