{literal}
    <div id="commentForm">
        <h1 class="title">Comentar</h1>
        <form method="post">
        <div class="cover">
                <select id="score">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
            </div>
            <div class="cover">
                <textarea placeholder="Comentario..." type="textarea" rows="7" cols="40" maxlength="140" id="comment" required></textarea>
            </div>
            <div class="cover">
                <button v-on:click.prevent="enviarComentario" >Comentar</button>
            </div>
        </form>
    </div>
{/literal}