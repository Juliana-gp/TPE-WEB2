<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';


class GenresView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();   
    }

    function adm($logged, $genres){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/tables/genresAdm.tpl');
    }

    function detail($logged, $id){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('genre', $id);
        $this->smarty->display('templates/details/genre.tpl');
    }

    function editDitail($logged, $fields){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('fields', $fields);
        $this->smarty->display('templates/details/genreEdit.tpl');
    }

    function main($logged, $genres){   
        $this->smarty->assign('logged', $logged);    
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/tables/genresMain.tpl');
    }

}