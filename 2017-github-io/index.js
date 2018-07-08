var tabs = $('#tab-title').find('li');
var contents = $('.content');

tabs.eq(0).addClass('active');
contents.eq(0).show();
tabs.mouseenter(function () {
    var idx = $(this).index();

    contents.eq(idx).show(100);
    contents.not(contents.eq(idx)).hide(100);

    tabs.removeClass('active');
    $(this).addClass('active');
});


// $('.close').click(function () {
//     $('.container').hide();
// });

setDrag($('.container'));