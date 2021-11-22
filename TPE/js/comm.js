"use strict"
const url = "http://localhost/TPEGIT/TPE-WEB2/TPE/api/comentarios";



Vue.component('comment-add', {
    template: `
    <div id="commentForm">
        <h1 class="title">Comentar</h1>
        <form method="post">
            <div class="cover">
                <select name="score" v-model="scoreV" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                </select>
            </div>
            <div class="cover">
                <textarea placeholder="Comentario..." type="textarea" rows="7" cols="40" maxlength="140" name="comment" v-model="titleV" required></textarea>
            </div>
            <div class="cover">
                <button @click="send">Crear</button>
            </div>
        </form>
    </div>
    `,
    data: function() {
        return {
            title: null
        }
    },
    methods: {
        send: function() {
            this.
        }
    }


})