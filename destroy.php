<?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        func();
    }
    else {
        session_start();
        unset($_SESSION['parse']);
        unset($_SESSION['hi']);
        $_SESSION['coin'] = 500;
        header('Location: startgame');
    }
    
    function func()
    {
        session_start();
        unset($_SESSION['parse']);
        unset($_SESSION['hi']);
        $_SESSION['coin'] = $_POST['money2'];
        $_SESSION['coin2'] = $_SESSION['coin'];
        header('Location: startgame');
        die;
    }
    
?> 