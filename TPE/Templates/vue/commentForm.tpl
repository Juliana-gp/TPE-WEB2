{literal}
    <div id="commentForm">
        <h1 class="title">Comentar</h1>
        <form method="post" id>
            <div class="cover">
                <select name="score">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
            </div>
            <div class="cover">
                <textarea placeholder="Comentario..." type="textarea" rows="7" cols="40" maxlength="140" name="comment" id="comment" required></textarea>
            </div>
            <div class="cover">
                <input type="submit" value="Crear">
            </div>
        </form>
    </div>
{/literal}