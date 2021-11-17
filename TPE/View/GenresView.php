<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';


class GenresView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();   
    }

    function adm($genres){
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/tables/genresAdm.tpl');
    }

    function detail($id){
        $this->smarty->assign('genre', $id);
        $this->smarty->display('templates/details/genre.tpl');
    }

    function editDitail($fields){
        $this->smarty->assign('fields', $fields);
        $this->smarty->display('templates/details/genreEdit.tpl');
    }

    function main($genres){   
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/tables/genresMain.tpl');
    }

}