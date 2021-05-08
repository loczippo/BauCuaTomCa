<?php
    function xuly($temp) {
        $con1 = $temp[0];
        $con2 = $temp[1];
        $con3 = $temp[2];
        if(!isset($_SESSION['parse'])) return;
        for($i = 0; $i<count($_SESSION['parse']);$i++) {
            $condat = $_SESSION['parse'][$i][0];
            $tiendat = substr($_SESSION['parse'][$i], 1);
            if($con1 == $condat && $con2 == $condat && $con3 == $condat) {
                $_SESSION['coin'] += $tiendat*3;
            }
            else if($con1 == $condat && $con2 == $condat) {
                $_SESSION['coin'] += $tiendat*2;
            }
            else if($con1 == $condat && $con3 == $condat) {
                $_SESSION['coin'] += $tiendat*2;
            }
            else if($con2 == $condat && $con3 == $condat) {
                $_SESSION['coin'] += $tiendat*2;
            }
            else if($con1 == $condat) {
                $_SESSION['coin'] += $tiendat;
            }
            else if($con2 == $condat) {
                $_SESSION['coin'] += $tiendat;
            }
            else if($con3 == $condat) {
                $_SESSION['coin'] += $tiendat;
            }
            else {
                $_SESSION['coin'] -= $tiendat;
            }
        }
}
?>