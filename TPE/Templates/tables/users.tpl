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
                    <td>{$user->user}</td>
                    <td>{$user->role}</td>
                    <td><a href="usuario/edit" class="link">Editar</a></td>
                    <td><a href="usuario/eliminar/{$user->id_user}" class="link">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>


{include file='templates/footer.tpl'}