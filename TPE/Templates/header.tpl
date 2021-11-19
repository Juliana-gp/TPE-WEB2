<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca</title>
</head>

<body>
    
    <header>
        <a href="genero/home"><img src="images/logo.png" alt="Logo biblioteca" id="logo"></a>   
    
        <nav>
            <li class="btn"><a href="genero/home">Home</a></li>
            {if isset($smarty.session.USERNAME)}
                {if ($smarty.session.ROLE) == "admin"}
                <li class="btn"><a href="libro/">Gestor</a></li>
                <li class="btn"><a href="usuario/gestor">Gestor usuarios</a></li>
                {/if}
                <li class="btn"><a href="usuario/logout">Logout</a></li>
            {else}
                <li class="btn"><a href="usuario/">Login</a></li>
                <li class="btn"><a href="usuario/crear">Crear Usuario</a></li>
            {/if}
                
        </nav>
    </header>
   
    <main>