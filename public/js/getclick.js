let dat = "";
let money = "";
let parse = "";
let myForm = document.getElementById('myForm');
let a = document.getElementById('dat');
let b = document.getElementById('money');
let c = document.getElementById('status');
let d = document.getElementById('parse');
let data1 = document.getElementById('money1').value;
$('img').click(function (event) {

    if ($(this).attr('id') == 0) {
        dat = "Nai";
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == 1) {
        dat = "Bầu";
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == 2) {
        dat = "Gà";
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == 3) {
        dat = "Cá";
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == 4) {
        dat = "Cua";
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == 5) {
        dat = "Tôm";
        parse = $(this).attr('id');
    }
    if ($(this).attr('id') == '5k') {
        money = 5;
        parse = $(this).attr('id');
    }
    else if ($(this).attr('id') == '10k') {
        money = 10;
    }
    else if ($(this).attr('id') == '20k') {
        money = 20;
    }
    else if ($(this).attr('id') == '50k') {
        money = 50;
    }
    else if ($(this).attr('id') == '100k') {
        money = 100;
    }
    else if ($(this).attr('id') == '200k') {
        money = 200;
    }
    if (dat == "") return;
    if (money == "") {
        alert2('Hình như có gì đó sai sai!','Bạn chưa chọn mức cược','warning','Xin lỗi được chưa');
        dat = "";
        return;
    }
    a.value = dat;
    b.value = money;
    c.value = 1;
    d.value = parse;
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    myForm.submit((e) => {
        e.preventDefault();
    });
    dat = "";
    money = "";
})