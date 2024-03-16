<?php
session_start();
include("connection.php");
$login_err = $password_err = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST["login_input"];
    $password = $_POST["Password"];
    if(filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
        $login_type = 'Gmail';
    }else {
        $login_type = 'Name';
    }
    $verif_credentials = "SELECT * FROM users WHERE $login_type = ? LIMIT 1";
    $stmt = $conn->prepare($verif_credentials);
    $stmt->bind_param("s", $login_input);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['Password'])) {
            $_SESSION['user_id'] = $row['ID'];
            header("Location: ../index.html");
            exit();
        }else{
            $password_err = "La contraseña es incorrecta";
        }
    }else{
        $login_err = "Usuario o correo electronico no encontrado";
    }
    $stmt->close();
    $conn->close();
}
?>


<!doctype html>
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../IMG/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../IMG/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../IMG/favicon/favicon-16x16.png">
    <link rel="manifest" href="../IMG/favicon/site.webmanifest">
    <link rel="stylesheet" href="../CSS/loginstyle.css"> 
</head> 
<body>
<section>
    <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
    <form action="" method="POST" enctype="multipart/form-data" class="signin">
        <div class="content"> 
            <h2>Inicio de sesión</h2> 
            <div class="form"> 
                <div class="inputBox"> 
                <input type="text" name="login_input"> <i>Correo electronico o usuario</i>
                <br>
                <div><?php echo $login_err ?></div> 
                </div> 
                <div class="inputBox"> 
                    <input type="password" name="Password"> <i>Contraseña</i> 
                    <br>
                    <div><?php echo $password_err ?></div>
                </div> 
                <div class="links">
                    <a href=""></a> <a href="./register.php">Registrarse</a> 
                </div> 
                <div class="inputBox"> 
                <input type="submit" value="Ingresar"> 
                </div> 
            </div> 
        </div> 
    </form>
</section> 
</body>
</html>