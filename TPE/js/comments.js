"use strict"
const url = "http://localhost/TPEGIT/TPE-WEB2/TPE/api/comentarios";


let app = new Vue({
    el: '#comments',
    data: {
        comments: [],
    },
    methods: {
        addComment: function(newComment) {

        }
    }

})

//----------------------------------  GET  -----------------------------------//
async function getComments() {
    try {
        let res = await fetch(url);
        let json = await res.json();

        app.comments = json;
    } catch (e) {
        console.log(e);
    }
}
getComments();


document.querySelector("#btnComentar").addEventListener("click", (e) => enviarDatos(e));

async function enviarDatos(e) {
    e.preventDefault();
    try {

        let form = document.querySelector("#nuevoComentario");
        let formData = new FormData(form);

        let newComment = {
            "comment": formData.get('comment'),
            "score": formData.get('score'),
            "id_user": form.getAttribute('dataUser'),
            "id_book": form.getAttribute('dataBook')
        }

        let res = await fetch(url, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(newComment),
        });

        console.log(newComment);
        getComments();
        //mostrarTabla();   

    } catch (error) {
        console.log(error);
    }
}