{include file='templates/header.tpl'}

<section>
    <h1>Gestor de géneros<a href="libro/" class="grey"> / Libros </a></h1>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripción</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$genres item=$genre}
                <tr>
                    <td>{$genre->Genre}</td>
                    <td>{$genre->Description}</td>
                    <td><a href="genero/ver/{$genre->Genre_id}"><img class="icon" src="images/icons/see.png"
                                alt="Ver más"></a></td>
                    <td><a href="genero/eliminar/{$genre->Genre_id}"><img class="icon" src="images/icons/trash.png"
                                alt="Eliminar"></a></td>
                    <td><a href="genero/editar/{$genre->Genre_id}"><img class="icon" src="images/icons/edit.png"
                                alt="Editar"></a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>

<aside>
    <h1>Crear género</h1>
    <form action="genero/crear/" method="post">
        <input placeholder="Género..." type="text" name="genre" id="genre" required>
        <textarea placeholder="Descripción..." type="textarea" rows="10" cols="50" name="description" id="description"
            required></textarea>
        <input type="submit" value="Crear">
    </form>
</aside>


{include file='templates/footer.tpl'}