{include file='templates/header.tpl'}

<main>
    <div>
        <h1>Gestor de usuarios</h1>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Rol</td>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=$user}
                    <tr>
                        <form action="usuario/editar/{$user->id_user}" method="post">
                            <td>{$user->user}</td>
                            <td>
                                <input type="radio" name="rol" value="admin" {if $user->role == "admin"}checked{/if} />
                                <label for="admin">Admin</label>
                            </td>
                            <td>
                                <input type="radio" name="rol" value="user" {if $user->role == "user"}checked{/if} />
                            </td>
                            <td><input type="submit" value="Actualizar"></td>
                        </form>
                        <td>
                            <a href="usuario/eliminar/{$user->id_user}">
                                <img class="icon" src="images/icons/trash.png" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        {if $respuesta}
            <p>{$respuesta}</p>
        {/if}
    </div>
</main>

{include file='templates/footer.tpl'}