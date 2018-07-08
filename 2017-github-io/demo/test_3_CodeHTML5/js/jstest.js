function GetRandomNum(Min, Max) {
    var Range = Max - Min;
    var Rand = Math.random();
    return (Math.round(Rand * Range));
}

document.write('<h1 color="orange">');
var num;
num = GetRandomNum(0, 1);
document.write(num + ".");
for (var i = 0; i < 6; i++) {
    num = GetRandomNum(1, 10);
    document.write(num);
}

document.write("</h1>");

function click_button() {
    var test = ["Lucky", "Unlucky"];
    num = GetRandomNum(0, 1);
    alert("You are " + test[num]);
}

function mDown(obj) {
    //obj.style.backgroundColor="#1ec5e5";
    obj.innerHTML = "(*´∇｀*)";
}

function f1() {
    if (document.getElementById('id1').value == "")
        alert("input cannot be empty");
}


//创建对象1
student = new Object();
student.name = "Tom";
student.age = "19";
student.study = function () {
    alert("沉迷学习无法自拔");
}

//创建对象2
function student_mod(name, age) {
    this.name = name;
    this.age = age;
    this.study = function () {
        alert("沉迷学习无法自拔");
    }
}

var student1 = new student_mod('Tom', '19');

function click_cc() {
    var color = ["#F44336", "#2196F3", "#00BCD4", "#009688", "#4CAF50", "#FFEB3B", "#FF9800", "#795548", "#9E9E9E", "#607D8B"];
    n = GetRandomNum(0, 9);
    document.getElementById("my_div").style.background = color[n];
    document.getElementById("cc").value = (color[n]);
    n = GetRandomNum(0, 9);
    document.getElementsByTagName("body")[0].style.background = color[n];
    document.getElementById("id1").value = (color[n]);
}
