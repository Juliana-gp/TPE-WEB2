{include file='templates/header.tpl' }


<h1 class="title">Listado de géneros<a href="libro/home" class="grey"> / Libros </a></h1>
{foreach from=$genres item=$genre}
    <div class="col-30">
        <article>
            <div class="cover">
                <img src="images/genres/{$genre->Img}" alt="Genero {$genre->Genre}">
            </div>
            <div>
                <h4>{$genre->Genre}</h4>
                <p><a href="libro/filtrar/{$genre->Genre_id}" class="link">ver libros</a></p>
                <p><a href="genero/ver/{$genre->Genre_id}" class="link">ver detalle</a></p>
            </div>
        </article>
    </div>
{/foreach}


{include file='templates/footer.tpl'}