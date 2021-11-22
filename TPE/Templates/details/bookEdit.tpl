{include file='templates/header.tpl'}

<main>
    <div class="col-30">
        <div class="cover">
            <img src="{$fields->Cover}" alt="Tapa del libro {$fields->Title}">
        </div>
    </div>

    <div class="col-45 textos">
        <form action="libro/editar/{$fields->Book_id}" method="post" enctype="multipart/form-data">

            <h3>Género:</h3>
            <select name="genre" id="genre" class="input-format">
                {foreach from=$genres item=$genre}
                    <option {if $fields->Genre_id == $genre->Genre_id} selected="selected" {/if} value="{$genre->Genre_id}">
                        {$genre->Genre}
                    </option>
                {/foreach}
            </select>


            <h3>Título:</h3>
            <input type="text" name="title" id="title" value="{$fields->Title}" placeholder=value class="input-format" required>

            <h3>Autor:</h3>
            <input type="text" name="author" id="author" value="{$fields->Author}" placeholder="Autor..." class="input-format" required>

            <h3>ISBN:</h3>
            <input type="number" name="ISBN" id="ISBN" value="{$fields->ISBN}" placeholder="ISBN..." min="1" class="input-format" required>

            <h3>Sinopsis: </h3>
            <textarea type="textarea" name="synopsis" id="synopsis" placeholder="Sinopsis..." rows="10" cols="50" class="input-format" required>{$fields->Synopsis}</textarea>

            <input type="file" name="cover" id="cover" value="{$fields->Cover}" selected="{$fields->Cover}" class="btn">
            <div>
            <input type="submit" value="Guardar cambios" id="guardar">
            <h5><a href="libro/ver/{$fields->Book_id}" class="link"> Volver al libro </a></h5>
            <h5><a href="libro/" class="link"> Ir al gestor </a></h5>
            </div>

        </form>
    </div>
</main>

{include file='templates/footer.tpl'}