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

    
    ((count($params) > 0) ? ($action = $params[1])
        : (count($params) > 1)) ? ($data = $params[2]) 
            : $action = '';
    
   
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
                    $genresController->showItem($data);     //muestra el detalle del género 
                    break; 
                case 'crear':
                    $genresController->add();
                    break;
                case 'eliminar': 
                    $genresController->delete($data); 
                    break;    
                case 'editar': 
                    $genresController->update($data);       //muestra el detalle editable del género
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
                    $booksController->showItem($data);    //muestra el detalle del libro
                    break;
                case 'crear': 
                    $booksController->add(); 
                    break;
                case 'eliminar': 
                    $booksController->delete($data); 
                    break;    
                case 'editar': 
                    $booksController->update($data);        //muestra el detalle editable del libro
                    break;
                case 'filtrar':  //por género
                    $booksController->filterByGenre($data); //muestra sólo los libros del mismo género
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
                default: 
                    $userController->login();
                    break;
                }
        break;
           
        default: 
            echo('404 Page not found'); 
            break;
            
    }


            
   
