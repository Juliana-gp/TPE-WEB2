{include file='templates/header.tpl' }

<main>
    <h1 class="title">Listado de libros<a href="genero/home" class="grey"> / Géneros </a></h1>
    {foreach from=$books item=$book}
        <div class="col-30">
            <article>
                <div class="cover">
                    {if $book->Cover == null}
                        <img src="images/covers/noDisponible.jpg" alt="La tapa de {$book->Title} no está disponible">
                    {else}
                        <img src="{$book->Cover}" alt="Portada del libro {$book->Title}">
                    {/if}      
                </div>
                <div>
                    <h4>{$book->Title}</h4>
                    <p>{$book->Author}</p>
                    <p><a href="libro/ver/{$book->Book_id}" class="link">ver detalle</a></p>
                </div>
            </article>
        </div>
    {/foreach}
</main>

{include file='templates/footer.tpl'}