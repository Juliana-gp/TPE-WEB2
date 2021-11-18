{include file='templates/header.tpl'}

<div class="center-content">

    <h1 class="title">Género {$genre}</h1>

    <div class="df">
        <div class="col-30">
            <div class="cover">
                <img src="{$book->Cover}" alt="Tapa de {$book->Title}">
            </div>
        </div>

        <div class="col-65 textos">
            <h3>Título:</h3>
            <h2>{$book->Title}</h2>
            <h3>Autor:</h3>
            <h2>{$book->Author}</h2>
            <h3>ISBN:</h3>
            <h2>{$book->ISBN}</h2>
            <h3>Sinopsis:</h3>
            <p>{$book->Synopsis}</p>


            {if isset($smarty.session.USERNAME) && ($smarty.session.ROLE) == "admin"}
                <div class="df">
                    <a href="libro/editar/{$book->Book_id}"><img class="icon" src="images/icons/edit.png" alt="Editar"></a>
                    <a href="libro/eliminar/{$book->Book_id}"><img class="icon" src="images/icons/trash.png" alt="Eliminar"></a>
                    <h5><a href="libro/" class="link  no-wrap"> Ir al gestor </a></h5>
                </div>
            {else}
                <h5><a href="libro/filtrar/{$book->Genre_id}" class="link"> Ver más libros de este género... </a></h5>
                <h5><a href="genero/home" class="link"> Home </a></h5>
            {/if}

        </div>
    </div>
</div>

<div class="center-content">
<h1 class="title">Comentarios</h1>

</div>
{include file='templates/footer.tpl'}