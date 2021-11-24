{literal}
    <div id="commentsList">
        <div class="comment" v-for="comment in comments">
            <div id="cover">
                <h4>Usuario: {{comment.user}}</h4>
            </div>
            <div>
            <p>Puntuación: {{comment.score}}</p>
            <p>{{comment.comment}}</p>

            </div>
            <p class="link" @click="eliminarComentario(comment.id_comment)" v-if="role ==='admin'">Eliminar</p>
        </div>
    </div>
{/literal}