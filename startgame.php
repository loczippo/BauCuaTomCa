<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.css">
  </head>
  <body style="background-image: url('public/img/background.jpg')">
        <div class="d-flex justify-content-end mt-1">
            <!-- <p class="mr-3">Tiền tặng bạn: <b> -->
            <?php
            session_start();
            // if(isset($_SESSION['coin2'])) echo $_SESSION['coin2'];
            // else {
            //     echo $_SESSION['coin'];
            // }
            //echo 500;
            ?>
            <!-- K</b></p> -->
          <a class= "mr-3"href="#"><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Cách chơi</button></a>
          <a href="/"><button class="btn btn-outline-success">Về trang chủ</button></a>
        </div>
        <h1 class="h1 text-center mt-5">BẦU CUA TÔM CÁ</h1>
        <div class="activity" id ="activity">
            <h6>Danh sách đặt cược</h6>
            <?php
            $count = 0;
            if(isset($_POST['dat'], $_POST['money'])) {
                $dat = $_POST['dat'];
                $tien = $_POST['money'];
                $parse = $_POST['parse'];
                $_SESSION['hi'][] = $dat .' - '. $tien . 'K';
                
                $_SESSION['parse'][] = $parse.$tien;
                //print_r ($_SESSION['hi']);

                for($i=0;$i<count($_SESSION['hi']);$i++) {

                    echo ($_SESSION['hi'][$i]) . '<br/>';
                    $get = str_replace('-', '', $_SESSION['hi'][$i]);
                    $count += (int) filter_var($get, FILTER_SANITIZE_NUMBER_INT);
                }
            }
            else if(isset($_SESSION['hi'])) {
                for($i=0;$i<count($_SESSION['hi']);$i++) {
                    echo ($_SESSION['hi'][$i]) . '<br/>';
                    $get = str_replace('-', '', $_SESSION['hi'][$i]);
                    $count += (int) filter_var($get, FILTER_SANITIZE_NUMBER_INT);
                }
            }
            echo "Lượt này bạn đặt: <b>${count}K</b>";
        ?>
        </div>
        <table id="tb3" border="1">
            <?php
                $temp = "";
                if(isset($_GET['type']) && isset($_POST['status']) != 1 ) {
                    if($_SESSION['coin'] <= 0) {
                        echo "<script>
                        location.href = 'startgame';//Reload my html page
                        </script>";
                    }
                    echo "<tr>";
                    for($i =0;$i<3;$i++) {
                        $random = rand(0,5);
                        $temp.=$random;echo "<td class='mr-3'><img src='./public/img/${random}.png' alt='' width='80px'></td>";

                    }
                    echo "</tr>";
                }
                else {
                    echo "<tr>";
                    for($i =0;$i<=2;$i++) {
                    echo "<td class='mr-3'><img src='./public/img/s.png' alt='' width='95%'></td>";
                    }
                    echo "</tr>";
                }
                $_SESSION['roll'] = $temp;
            ?>
        </table>

        <!-- xu ly tien -->
        <?php
            if(isset($_GET['type']) && isset($_POST['status']) != 1 ) {
                if($_SESSION['coin'] <= 0) {
                    echo "<script>
                    location.href = 'startgame';//Reload my html page
                    
                    </script>";
                }
                include 'tinhtien.php';
                xuly($temp);
            }
        ?>
        <table id="tb" border="1">
            <?php
                echo "<tr>";
                for($i = 0; $i <= 2; $i++) {
                    echo "<td><img id='${i}' src='public/img/${i}.png' alt='' width='55%' /></td>";
                }
                echo "</tr>";
            ?>
            <?php
                echo "<tr>";
                for($i = 3; $i <= 5; $i++) {
                    echo "<td><img id='${i}' src='public/img/${i}.png' alt='' width='55%' /></td>";
                }
                echo "</tr>";
            ?>
        </table>
        <table id="tb1">
        <caption>Tổng tiền hiện có: <b>
            <?php 
                echo $_SESSION['coin']<=0?0:$_SESSION['coin'];
            ?>K
            </b></caption>
            <?php
                echo "<tr>";
                for($i = 5; $i <= 20; $i++) {
                    if(file_exists("public/img/${i}k.png")) {
                        echo "<td><img id='${i}k' src='public/img/${i}k.png' title='${i} nghìn' width='170px' /></td>";
                    }
                }
                echo "</tr>";
            ?>
            <?php
                echo "<tr>";
                for($i = 50; $i <= 200; $i++) {
                    if(file_exists("public/img/${i}k.png")) {
                        echo "<td><img id='${i}k' src='public/img/${i}k.png' title='${i} nghìn' width='170px' /></td>";
                    }
                }
                echo "</tr>";
            ?>
            <tr>
            <td>
                <div class="list" style="display: flex;justify-content: space-around" id="formm">
                <form action="xuly" method="post" onsubmit="return mySubmitFunction(event)">
                    <input id="roll" name="roll" type="text" value="" hidden>
                    <!-- <input id="parse" name="parse" type="text" value="" hidden> -->
                    <input id="count" name="count" type="text" value="<?php echo $count ?>" hidden>
                    <input id="money1" name="money1" type="text" value="<?php echo $_SESSION['coin'];  ?>" hidden> 
                    <input type="submit" class=" btn btn-success" name="someAction" value="QUAY" />
                </form>
                <form action="destroy" method="post">
                    <input id="money2" name="money2" type="text" value="<?php echo $_SESSION['coin'];  ?>" hidden> 
                    <input type="submit" class=" btn btn-danger" name="someAction" value="VÁN MỚI" />
                </form>
                </div>
            </tr>
        </table>
        <form method="POST" id="myForm" name="myForm">
            <input id="dat" name="dat" type="text" value="" hidden>
            <input id="money" name="money" type="text" value="" hidden>
            <input id="status" name="status" type="text" value="" hidden>
            <input id="parse" name="parse" type="text" value="" hidden>
        </form>
        <?php
            require_once 'modal.php';
        ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="public/js/getclick.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.min.js"></script>
    <script>
        let fomm = document.getElementById('formm');
        let data = document.getElementById('money1').value;
        let count = document.getElementById('count').value;
        function mySubmitFunction(e) {
            if(Number(data)<=0) {
                alert1('Oops!','Còn xu nào đâu','error','Cho bé 5 xị');
                return false;
            }
            else if(Number(count)>Number(data)) {
                alert2('Oops!','Bạn không đủ tiền','error','Xin lỗi được chưa');
                return false;
            }
            
            
        }
        function alert1(title, text, type, btn){
        Swal({
            title: title,
            text: text,
            type: type,
            confirmButtonText: btn
        }).then((result) => {
          if (result.value) {
            location.href='destroy';
          }
        })
    }
        function alert2(title, text, type, btn){
        Swal({
            title: title,
            text: text,
            type: type,
            confirmButtonText: btn
        })
    }
    </script>
  </body>
</html>