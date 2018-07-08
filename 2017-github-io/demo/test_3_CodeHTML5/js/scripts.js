function print1() {
    alert("Hello World");
}

var count = 0;

function set_text() {
    ++count;
    //alert(count);
    var name = "div1";
    if (count % 2 != 0) {
        document.getElementById(name).style.height = '30px';
        document.getElementById(name).style.width = '100px';
        document.getElementById(name).style.background = "#8BC34A";
    }
    else
        document.getElementById(name).style.height = '0px';
}
