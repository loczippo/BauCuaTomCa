<script>
        let dat="";
    let money="";
    let myForm = document.getElementById('myForm');
    let a = document.getElementById('dat');
    let b = document.getElementById('money');
    let c = document.getElementById('status');
$('img').click(function (event) {
    
    if ($(this).attr('id') == 0) {
        dat = "Nai";
    }
    else if ($(this).attr('id') == 1) {
        dat = "Bầu";
    }
    else if ($(this).attr('id') == 2) {
        dat = "Gà";
    }
    else if ($(this).attr('id') == 3) {
        dat = "Cá";
    }
    else if ($(this).attr('id') == 4) {
        dat = "Cua";
    }
    else if ($(this).attr('id') == 5) {
        dat = "Tôm";
    }
    if ($(this).attr('id') == '5k') {
        money = 5;
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
    if(dat == "") return;
    if(money == "") {
        alert("Chưa chọn tiền");
        dat="";
        return;
    }
    else {
        
    }
    a.value=dat;
    b.value = money;
    c.value = 1;
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    myForm.submit((e) => {
        e.preventDefault();
    });
    dat="";
    money="";
})

</script>