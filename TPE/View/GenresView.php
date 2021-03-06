<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';


class GenresView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();   
    }

    function adm($genres, $respuesta=null){
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('resp', $respuesta);
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

    function main($genres, $access = null){
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('access', $access);
        $this->smarty->display('templates/tables/genresMain.tpl');
    }

}