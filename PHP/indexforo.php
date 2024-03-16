<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


// Aquí se incluiría el código para mostrar la lista de foros y temas
//echo "Bienvenido al foro";

// Enlace para cerrar sesión
//echo "";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../IMG/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../IMG/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../IMG/favicon/favicon-16x16.png">
    <link rel="manifest" href="../IMG/favicon/site.webmanifest">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--CSS-->
    <link rel="stylesheet" href=../CSS/style.css>
    <link rel="stylesheet" href="../CSS/foros.css">

    <title>Foro</title>
</head>
<body>
    <header>
        <!--Nav Bar-->
        <nav>
            <div class="PrincipalSideBar" id="HouseOpen">
                <a href="#"><img src="../IMG/ciber-guardian-logo-transparent.png" alt="" class="ItemsSideBarLogo" id="HouseClose"  onclick="SideBar(event)"></a>
            </div>  
            </div>
            <div class="SideBar" id="SideBar">
                <a href="#" class="ItemsSideBar" onclick="SideBar(event)"><i class="bi bi-telephone"></i>Foro</a>
                <a href="../index.html" class="ItemsSideBar"><i class="bi bi-house"></i>Incio</a>
                <a href="../Mas_Paginas/Nosotros.html" class="ItemsSideBar"><i class="bi bi-braces"></i>Nosotros</a>
                <a href="../Mas_Paginas/Servicios.html" class="ItemsSideBar"><i class="bi bi-virus"></i>Servicios</a>
                <a href="../Mas_Paginas/clientes.html" class="ItemsSideBar"><i class="bi bi-person-check-fill"></i>Clientes</a>
                <a href="../PHP/login.php" class="ItemsSideBar"><i class="bi bi-box-arrow-in-right"></i>Login</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="Foros">
                <h1>Foros de Clientes</h1>
            </div>
            <!-- 
            <div>
                <div><h1>Titulo</h1></div>
                <div><h3>Autor</h3></div>
                <div><p>Hora</p></div>
            </div>
            -->
        </div>
        <div>
            <a href='logout.php'>Cerrar sesión</a>
        </div>
    </main>
    <footer>

    </footer>
</body>
    <script src="../JS/app.js"></script>
</html>