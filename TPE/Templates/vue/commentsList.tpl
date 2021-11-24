{literal}
    <div id="commentsList">
        <p class="filter" @click="getOrdenados('score', 'DESC')" >Mayor puntaje primero</p>
        <p class="filter" @click="getOrdenados('score', 'ASC')">Menor puntaje primero</p>
        <p class="filter" @click="getOrdenados('id_comment', 'ASC')">Mas antiguos primero</p>
        <p class="filter" @click="getOrdenados('id_comment', 'DESC')">Mas recientes primero</p>

        <div class="comment"v-for="comment in comments">
                <h4>Usuario: {{comment.user}}</h4>
                <p>{{comment.score}} ★</p>
                <p>{{comment.comment}}</p>
                <p class="eliminarCom" @click="eliminarComentario(comment.id_comment)" v-if="role ==='admin'">Eliminar comentario</p>
        </div>
    </div>
{/literal}