<?php
include("connection.php");

$Password_err = $gmail_err = $user_name_err ='';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["Gmail"])) {
        $gmail_err = '<font style="color:red;">Ingrese un correo electronico </font>';
    }else{
        $Gmail = $_POST["Gmail"];
        $verf_gmail = "SELECT * FROM users WHERE Gmail = '$Gmail'";
        $result = $conn->query($verf_gmail);

        if($result->num_rows > 0){
            $gmail_err = '<font style="color:red;">El correo ya esta utilizado </font>';
        }
    }

    if(empty($_POST["user_name"])) {
        $user_name_err = '<font style="color:red;">Ingrese un nombre de cuenta</font>';
    }else{
        $user_name = $_POST["user_name"];
    }

    if(empty($_POST["Password"])) {
        $Password_err = '<font style="color:red;">Ingrese una contraseña</font>';
    }elseif(strlen($_POST["Password"]) < 6) {
        $Password_err = '<font style="color:red;">La contraseña debe tener más de 6 digitos</font>';
    }else{
        $Password = $_POST["Password"];
    }
    
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    if(empty($gmail_err) && empty($user_name_err) && empty($Password_err)) {
        $stmt = $conn->prepare("INSERT INTO users (Name, Password, Gmail) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user_name, $hashed_password, $Gmail);

        if($stmt->execute()) {
            echo "Datos ingresados corectamente";
            header("Location: login.php");
        }

        $stmt->close();
    }
    $conn->close();
}


?>

<!doctype html>
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/loginstyle.css"> 
</head> 
<body>
<section>
    <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
    <form action="" method="POST" enctype="multipart/form-data" class="signin">
        <div class="content"> 
            <h2>Registrarse</h2> 
            <div class="form">
                <div class="inputBox"> 
                    <input type="text" name="Gmail"> <i>Correo Electronico</i>
                    <br>
                    <div><?php echo $gmail_err; ?></div>
                </div> 
                <div class="inputBox"> 
                    <input type="text" name="user_name"> <i>Nombre de usuario</i>
                    <br>
                    <div><?php echo $user_name_err; ?></div>
                </div> 
                <div class="inputBox"> 
                    <input type="password" name="Password"> <i>Contraseña</i>
                    <br>
                    <div><?php echo $Password_err; ?></div>
                </div>
                
                <div class="links">
                    <a href="#"> </a><a href="./login.php">Iniciar sesión</a> 
                </div> 
                <div class="inputBox"> 
                    <input type="submit" value="Registarse"> 
                </div> 
            </div> 
        </div>
    </form>
</section> 
</body>
</html>