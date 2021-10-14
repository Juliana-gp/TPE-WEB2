
{include file='header.tpl' logged={false} }


    <div>
        <h2>{$title}</h2>
        <form action="usuario/{$action}" method="post">
            <input placeholder="USUARIO" type="text" name="usuario" id="usuario" required>
            <input placeholder="CONTRASEÑA" type="password" name="password" id="password" required>
            <input type="submit" value="{$btnTitle}">
        </form>
        <p><a href="usuario/{$action2}" class="link">{$text}</a></p>
        <p>{$error}</p>
    </div>


{include file='footer.tpl'}