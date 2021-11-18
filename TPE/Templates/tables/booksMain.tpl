{include file='templates/header.tpl' }



<h1 class="title">Listado de libros<a href="genero/home" class="grey"> / Géneros </a></h1>
{foreach from=$books item=$book}
    <div class="col-30">
        <article>
            <div class="cover">
                <img src="{$book->Cover}" alt="Portada del libro {$book->Title}">
            </div>
            <div>
                <h4>{$book->Title}</h4>
                <p>{$book->Author}</p>
                <p><a href="libro/ver/{$book->Book_id}" class="link">ver detalle</a></p>
            </div>
        </article>
    </div>
{/foreach}


{include file='templates/footer.tpl'}