{include file='templates/header.tpl'}
<main>

    <div class="col-30">
        <div class="cover">
            <img src="images/genres/{$fields->Img}" alt="Género {$fields->Genre}">
        </div>
    </div>

    <div class="col-45 textos">
        <form action="genero/editar/{$fields->Genre_id}" method="post">
            <h3>Género</h3>
            <input type="text" placeholder="Género" name="genre" id="genre" value="{$fields->Genre}" class="input-format" required>

            <h3>Descripción: </h3>
            <textarea placeholder="Descripción..." type="textarea" rows="10" cols="50" name="description" id="description" class="input-format" required>{$fields->Description}</textarea>
            <input type="submit" value="Guardar cambios">

            <h5><a href="genero/ver/{$fields->Genre_id}" class="link"> Ir al detalle </a></h5>
            <h5><a href="genero/" class="link"> Ir al gestor </a></h5>
            <h5><a href="libro/genero/{$fields->Genre_id}" class="link">Ver libros del género</a></h5>

        </form>
    </div>
</main>

{include file='templates/footer.tpl'}