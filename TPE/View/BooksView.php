<?php
    require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

    class BooksView{

        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();   
        }

        function adm($books, $genres){
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('books', $books);
            $this->smarty->display('templates/tables/booksAdm.tpl');
        }

        function detail($book, $genre){
            $this->smarty->assign('book', $book);
            $this->smarty->assign('genre', $genre);
            $this->smarty->display('templates/details/book.tpl');
        }

        function editDitail($genres, $fields){
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('fields', $fields);
            $this->smarty->display('templates/details/bookEdit.tpl');
        }

        function list($books, $genre){
            $this->smarty->assign('books', $books);
            $this->smarty->assign('genre', $genre);
            $this->smarty->display('templates/tables/books.tpl');
        }

        function main($books){ 
            $this->smarty->assign('books', $books);
            $this->smarty->display('templates/tables/booksMain.tpl');
        }

        function showHomeLocation(){
            header("location: ".BASE_URL."genero/home");
        }

}

