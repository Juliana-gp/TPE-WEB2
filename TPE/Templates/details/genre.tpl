{include file='templates/header.tpl'}

<main>
    <div class="center-content">
        <h1 class="title">Género: {$genre->Genre}</h1>
        <div class="df">
            <div class="col-30">
                <div class="cover">
                    <img src="images/genres/{$genre->Img}" alt="Género {$genre->Genre}">
                </div>
            </div>

            <div class="col-45 textos">
                <h3>Descripción:</h3>
                <p>{$genre->Description}</p>

                {if ((isset($smarty.session.USERNAME)) && ($smarty.session.ROLE) == "admin" )}
                    <div class="df">
                        <a href="genero/editar/{$genre->Genre_id}"><img class="icon" src="images/icons/edit.png" alt="Editar"></a>
                        <a href="genero/eliminar/{$genre->Genre_id}"><img class="icon" src="images/icons/trash.png" alt="Eliminar"></a>
                        <h5><a href="genero/" class="link"> Ir al gestor </a></h5>
                    </div>
                {else}
                    <h5><a href="libro/filtrar/{$genre->Genre_id}" class="link">Ver libros del género</a></h5>
                    <h5><a href="genero/home" class="link">Volver al home</a></h5>
                {/if}
            </div>
        </div>
    </div>
</main>

{include file='templates/footer.tpl'}