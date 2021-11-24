{include file='templates/header.tpl' }

<main>

    <section>
        <h1>Gestor de libros<a href="genero/" class="grey"> / Géneros </a></h1>
        <h4>{$resp}</h4>
        <table>
            <thead>
                <tr>
                    <td>Título</td>
                    <td>Autor</td>
                    <td>ISBN</td>
                    <td>Género</td>
                </tr>
            </thead>
            <tbody>
                {foreach from=$books item=$book}
                    <tr>
                        <td>{$book->Title}</td>
                        <td>{$book->Author}</td>
                        <td>{$book->ISBN}</td>
                        {foreach from=$genres item=$genre}
                            {if $genre->Genre_id == $book->Genre_id}
                                <td>{$genre->Genre}</td>
                                {break}
                            {/if}
                        {/foreach}
                        <td>
                            <a href="libro/ver/{$book->Book_id}">
                                <img class="icon" src="images/icons/see.png" alt="Ver más">
                            </a>
                        </td>
                        <td>
                            <a href="libro/eliminar/{$book->Book_id}">
                                <img class="icon" src="images/icons/trash.png" alt="Eliminar">
                            </a>
                        </td>
                        <td>
                            <a href="libro/editar/{$book->Book_id}">
                                <img class="icon" src="images/icons/edit.png" alt="Editar">
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>

    <aside>
        <h1>Crear libro</h1>
        <form action="libro/crear" method="post" enctype="multipart/form-data">
            <input placeholder="Título..." type="text" name="title" id="title" required>
            <input placeholder="Autor..." type="text" name="author" id="author" required>
            <input placeholder="ISBN..." type="number" min="1" name="ISBN" id="ISBN" required>
            <textarea placeholder="Sinopsis..." type="textarea" rows="10" cols="50" name="synopsis" id="synopsis"
                required></textarea>

            <select name="genre" id="genre">
                {foreach from=$genres item=$genre}
                    <option value="{$genre->Genre_id}">{$genre->Genre}</option>
                {/foreach}
            </select>

            <input type="file" name="cover" id="cover" required>
            <input type="submit" value="Crear">
        </form>
    </aside>
    
</main>

{include file='templates/footer.tpl'}