<?php
    require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

    class BooksView{

        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();   
        }

        function adm($logged, $books, $genres){
            $this->smarty->assign('logged', $logged); 
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('books', $books);
            $this->smarty->display('templates/tables/booksAdm.tpl');
        }

        function detail($logged, $book, $genre){
            $this->smarty->assign('logged', $logged);
            $this->smarty->assign('book', $book);
            $this->smarty->assign('genre', $genre);
            $this->smarty->display('templates/details/book.tpl');
        }

        function editDitail($logged, $genres, $fields){
            $this->smarty->assign('logged', $logged);
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('fields', $fields);
            $this->smarty->display('templates/details/bookEdit.tpl');
        }

        function list($logged, $books, $genre){
            $this->smarty->assign('logged', $logged);
            $this->smarty->assign('books', $books);
            $this->smarty->assign('genre', $genre);
            $this->smarty->display('templates/tables/books.tpl');
        }

        function main($logged, $books){ 
            $this->smarty->assign('logged', $logged);      
            $this->smarty->assign('books', $books);
            $this->smarty->display('templates/tables/booksMain.tpl');
        }

        function showHomeLocation(){
            header("location: ".BASE_URL."genero/home");
        }

}

