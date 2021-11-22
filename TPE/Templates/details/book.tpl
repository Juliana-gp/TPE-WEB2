{include file='templates/header.tpl'}

<main>
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
        <h1 class="title" data="{$book->Book_id}">Comentarios</h1>

        {include file='templates/vue/comments.tpl'}
  


        <!--{include file='templates/vue/commentForm.tpl'}-->
        <div id="commentForm">
            <h1 class="title">Comentar</h1>
            <form method="post" dataUser={$smarty.session.USERID} dataBook={$book->Book_id} id="nuevoComentario">
                <div class="cover">
                    <select name="score">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected>5</option>
                    </select>
                </div>
                <div class="cover">
                    <textarea placeholder="Comentario..." type="textarea" rows="7" cols="40" maxlength="140" name="comment" id="comment" required></textarea>
                </div>
                <div class="cover">
                    <button id="btnComentar">Comentar</button>
                </div>
            </form>
        </div>
 


    </div>
</main>

<script src="js/comments.js"></script>


{include file='templates/footer.tpl'}