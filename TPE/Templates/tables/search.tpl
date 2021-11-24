{include file='templates/header.tpl' }

<main>

    <section>
        <h1>Buscador de libros</h1>
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
                        {if (isset($smarty.session.USERNAME) && ($smarty.session.ROLE) == "admin")}
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
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>

    <aside>
        <h1>Buscar por...</h1>
        <form action="libro/filtrar" method="post">
            <input placeholder="Título..." type="text" name="title" id="title" >
            <input placeholder="Autor..." type="text" name="author" id="author" >
            <input placeholder="ISBN..." type="number" min="1" name="ISBN" id="ISBN" >
            <textarea placeholder="Sinopsis..." type="textarea" rows="10" cols="50" name="synopsis" id="synopsis"></textarea>

            <select name="genre" id="genre">
                <option value = "null">sin seleccionar</option>
                {foreach from=$genres item=$genre}
                    <option value="{$genre->Genre_id}">{$genre->Genre}</option>
                {/foreach}   
            </select>

            <input type="submit" value="Filtrar">
        </form>
    </aside>
    
</main>

{include file='templates/footer.tpl'}