{literal}
    <div id="commentForm">
        <form method="post" id="newComment">
            <div class="cover">
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="score" value="5"><label for="radio1">★</label>
                    <input id="radio2" type="radio" name="score" value="4"><label for="radio2">★</label>
                    <input id="radio3" type="radio" name="score" value="3"><label for="radio3">★</label>
                    <input id="radio4" type="radio" name="score" value="2"><label for="radio4">★</label>
                    <input id="radio5" type="radio" name="score" value="1"><label for="radio5">★</label>
                </p>
            </div>
            <div class="cover">
                <textarea id="comment" placeholder="Comentario..." type="textarea" rows="7" cols="40" maxlength="140" name="comment" required></textarea>
            </div>
            <div class="cover">
                <button v-on:click.prevent="enviarComentario">Comentar</button>
            </div>
        </form>
    </div>
{/literal}