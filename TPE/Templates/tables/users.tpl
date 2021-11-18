{include file='templates/header.tpl'}

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
                            <input type="radio" name="rol" value="admin" {if $user->rol == "admin"}checked{/if} />
                            <label for="admin">Admin</label>
                        </td>
                        <td>
                            <input type="radio" name="rol" value="normal" {if $user->rol == "normal"}checked{/if} />
                            <label for="normal">User</label>
                        </td>
                        <td><input type="submit" value="Actualizar"></td>
                    </form>
                    <td><a href="usuario/eliminar/{$user->id_user}" class="link">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>


{include file='templates/footer.tpl'}