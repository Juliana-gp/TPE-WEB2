{include file='templates/header.tpl'}

<section>
    <h1 class="title">Libros del Género {$genre->Genre}</h1>
    <ul>
        {foreach from=$books item=$book}
            <li>
                <article>
                    <div class="texts">
                        <h4>Titulo: {$book->Title}</h4>
                        <p class="author">Autor: {$book->Author}</p>
                        <p class="bookLink"><a href="libro/ver/{$book->Book_id}" class="link">ver detalle del libro</a></p>
                    </div>
                </article>
            </li>
        {/foreach}
    </ul>
    <h4><a href="genero/home" class="link"> Volver al home </a></h4>
</section>

<aside>
    <div class="cover">
        <img src="images/genres/{$genre->Img}" alt="Genero {$genre->Genre}">
    </div>

    <h3>{$genre->Genre}</h3>
    <p> {$genre->Description}</p>
</aside>

{include file='templates/footer.tpl'}