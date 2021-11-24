<?php
    require_once "Controller/BooksController.php";
    require_once "Controller/GenresController.php";
    require_once "Controller/UserController.php";


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


    if (!empty($_GET['action'])) {
        $request = $_GET['action'];
    } else {
        $request = 'genero';
    }

    
    $params = explode('/', $request);
    $object = $params[0];
    $action = '';
    
    if (count($params) >= 2){
        $action = $params[1];
    } 
   
    $booksController = new BooksController();
    $genresController = new GenresController();
    $userController = new UserController();

    switch ($object) {

        case 'genero':
            switch($action) {
                case 'home': 
                    $genresController->showHome();        //muestra el main de géneros                 
                    break;
                case 'ver':                    
                    $genresController->showItem($params[2]);     //muestra el detalle del género 
                    break; 
                case 'crear':
                    $genresController->add();
                    break;
                case 'eliminar': 
                    $genresController->delete($params[2]); 
                    break;    
                case 'editar': 
                    $genresController->update($params[2]);       //muestra el detalle editable del género
                    break;
                default: 
                    $genresController->showAdm();           //muestra el gestor de géneros 
                    break;                                  
            }
        break;

        case 'libro':
            switch($action){
                case 'home':                                
                    $booksController->showHome();         //muestra el main de libros
                    break;
                case 'ver':                                
                    $booksController->showItem($params[2]);    //muestra el detalle del libro
                    break;
                case 'crear': 
                    $booksController->add(); 
                    break;
                case 'eliminar': 
                    $booksController->delete($params[2]); 
                    break;    
                case 'editar': 
                    $booksController->update($params[2]);        //muestra el detalle editable del libro
                    break;
                case 'genero':
                    $booksController->filter($params[2]);        //muestra sólo los libros del mismo género
                    break;
                case 'filtrar': 
                    $booksController->filter();
                    break;
                default: 
                    $booksController->showAdm();            //muestra el gestor de libros
                    break;
                }
        break;
        
        case 'usuario':
            switch ($action){
                case 'login':
                    $userController->login();          
                    break;   
                case 'logout':
                    $userController->logout();
                    break;
                case 'crear':
                    $userController->add();
                    break;
                case 'gestor':
                    $userController->showUsers();
                    break;
                case 'eliminar':
                    $userController->delete($params[2]);
                    break;
                case 'editar':
                    $userController->update($params[2]);
                    break;                    
                default: 
                    $userController->login();
                    break;
                }
        break;
           
        default: 
            echo('404 Page not found'); 
            break;
            
    }


            
   
