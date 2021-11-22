{literal}
    <div id="comments">
        <div class="comment" v-for="comment in comments">
            <div id="cover">
                <h4>Puntuación: {{comment.score}}</h4>
            </div>
            <div>
            <p>{{comment.comment}}</p>
            </div>
            <p>Eliminar</p>
        </div>
    </div>
{/literal}