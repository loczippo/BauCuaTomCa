<?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        func();
    }
    
    function func()
    {
        session_start();
        $_SESSION['coin'] = $_POST['money1'];
        if($_POST['count'] > $_POST['money1']) {
            header("Location: startgame");
            die;
        }
        header("Location: startgame?type=roll");
        die;
    }
?>