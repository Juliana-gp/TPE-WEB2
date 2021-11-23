{literal}
    <div id="commentsList">
        <div class="comment" v-for="comment in comments">
            <div id="cover">
                <h4>Puntuación: {{comment.score}}</h4>
            </div>
            <div>
            <p>{{comment.comment}}</p>
            </div>
            <p @click="eliminarComentario(comment.id_comment)" v-if="role ==='admin'">Eliminar</p>
        </div>
    </div>
{/literal}