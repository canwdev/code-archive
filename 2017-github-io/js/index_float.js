$('#body_float').on('mousemove', function (e) {

    var offset = $('#body_float').offset()

    var x = e.pageX - offset.left
    var y = e.pageY - offset.top

    var centerX = $('#body_float').outerWidth() / 2
    var centerY = $('#body_float').outerHeight() / 2

    var deltaX = x - centerX
    var deltaY = y - centerY

    var percentX = deltaX / centerX
    var percentY = deltaY / centerY

    var deg = 10


    $('#banner').css({
        transform: 'rotateX(' + deg * -percentY + 'deg)' +
        ' rotateY(' + deg * percentX + 'deg)'
    })
})

$('#body_float').on('mouseleave', function () {
    $('#banner').css({
        transform: ''
    })
})