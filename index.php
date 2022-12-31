<?php
require 'koneksi.php';
if( isset ($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];  
    
    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        header("Location: dashboard.php");
        exit;

        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }
    
    if($error = true) {
        echo "<script>
                    alert('username atau password salah!')
              </script>";
    }
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <script language='JavaScript'>
        var txt="Sistem Pendukung Keputusan Pemilihan Saham LQ45 Terbaik dengan Metode SAW  ";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresh=setTimeout("action()",speed);}action();
        </script>
        <link rel="icon" type="image/png" href="assets/images/chart.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <script src="assets/js/jquery.min.js"></s>
        <script src="assets/js/bootstrap.min.js"></script> 
        <style>
                .main-content{
                    width: 50%;
                    border-radius: 20px;
                    box-shadow: 0 5px 5px rgba(0,0,0,.4);
                    margin: 10em auto;
                    display: flex;
               }
                .company__info{
                    background-color: #008080;
                    border-top-left-radius: 20px;
                    border-bottom-left-radius: 20px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    color: #fff;
                }
                .fa-line-chart{
                    font-size:5em;
                    margin-botom: 2em;
                }
                @media screen and (max-width: 640px) {
                    .main-content{width: 90%;}
                    .company__info{
                        display: none;
                    }
                    .login_form{
                        border-top-left-radius:20px;
                        border-bottom-left-radius:20px;
                    }
                }
                @media screen and (min-width: 642px) and (max-width:800px){
                    .main-content{width: 70%;}
                }
                .row > h2{
                    color:#008080;
                }
                .login_form{
                    background-color: #fff;
                    border-top-right-radius:20px;
                    border-bottom-right-radius:20px;
                    border-top:1px solid #ccc;
                    border-right:1px solid #ccc;
                }
                form{
                    padding: 0 2em;
                }
                .form__input{
                    width: 100%;
                    border:0px solid transparent;
                    border-radius: 0;
                    border-bottom: 1px solid #aaa;
                    padding: 1em .5em .5em;
                    padding-left: 2em;
                    outline:none;
                    margin:1.5em auto;
                    transition: all .5s ease;
                }
                .form__input:focus{
                    border-bottom-color: #008080;
                    box-shadow: 0 0 5px rgba(0,80,80,.4); 
                    border-radius: 4px;
                }
                .btn{
                    transition: all .5s ease;
                    width: 70%;
                    border-radius: 30px;
                    color:#008080;
                    font-weight: 600;
                    background-color: #fff;
                    border: 1px solid #008080;
                    margin: auto
                }
                .btn:hover, .btn:focus{
                    background-color: #008080;
                    color:#fff;
                }


        </style>
    </head>
    <body>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <h5 class="fa fa-line-chart" aria-hidden="true"></h5>
                    <h4 class="company_title">Saham LQ45</h4>
                    
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Log In</h2>
                        </div>
                        <div class="row">
                            <form action="" method="post" class="form-group">
                                <div class="row">
                                    <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                                </div>
                                <div class="row">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                                </div>
                                <div class="row">
                                    <input type="submit" name="login" class="btn">
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <p>Don't have an account? <a href="register.php">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>