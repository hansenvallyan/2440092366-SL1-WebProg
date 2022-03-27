<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <?php 
        session_start();
        $username=$password="";
        $errorMsg=array();
        if(empty($_SESSION)){
            array_push($errorMsg , "Sebelum login, silahkan Registrasi terlebih dahulu !");
        }
        if(isset($_POST['submit']) ){
            $username=$_POST['username'];
            $password = $_POST['password'];
            if(empty(trim($_POST['username']))){
                // $errorMsg="Username harus di isi !";
                array_push($errorMsg , "Username harus di isi !");
            }else if(empty(trim($_POST['password']))){
                // $errorMsg="Password harus di isi !";
                array_push($errorMsg , "Password harus di isi !");
            }
            else if($_SESSION['username']!= $username || $_SESSION['password1']!=$password){
                // $errorMsg="Username atau Password tidak sama pada saat registrasi !";
                array_push($errorMsg , "Username atau Password tidak sama pada saat registrasi !");
            }

            if(count($errorMsg)==0){
                header('Location: ./home.php');
            }

        }

        function cek_error(){
            global $errorMsg;
            if(count($errorMsg)>0){
                foreach($errorMsg as $err){
                    echo $err. "<br/>";
                }
                echo "<br>";
            }
        }

    ?>
    <div class="content">
        <div class="title">
            Login
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="boxContainer">
                <div class="fieldContainer">
                    <div class="field">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="" <?php if(empty($_SESSION)){echo "disabled";}?> value="<?php echo $username ?>" >
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" <?php if(empty($_SESSION)){echo "disabled";}?> value="<?php echo $password ?>">
                    </div>  
                </div>
                <span>
                    <?php 
                        echo cek_error(); 
                    ?>
                </span>
                <div class="buttonContainer">
                    <input type="submit" name="submit" value="Login" <?php if(empty($_SESSION)){echo "disabled";}?> id="login">
                    <div  id="kembali">
                        Kembali
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</body>
<script src="login.js"></script>
</html>