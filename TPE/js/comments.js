"use strict"
const url = "http://localhost/TPEGIT/TPE-WEB2/TPE/api/comentarios";

let book = document.querySelector("#info").getAttribute('dataBook');
let idUser = document.querySelector("#info").getAttribute('dataIdUser');

getComments(book);

let app = new Vue({
    el: '#commentsList',
    data: {
        comments: [],
        role: ''
    },
    methods: {
        eliminarComentario: function(comment) {
            deleteComment(comment);
        }
    }
})


//----------------------------------  GET  -----------------------------------//
async function getComments(book) {
    try {
        let res = await fetch(url + "?book=" + book);
        if (res.status == 200) {
            let json = await res.json();
            app.comments = json;
        }
    } catch (e) {
        console.log(e);
    }
}

//------------------------------------  ADD / POST -----------------------------------------//
async function sendComment() {
    try {
        let comment = document.querySelector("#comment");
        let score = document.querySelector("#score");
        if (comment.value != "") {
            let newComment = {
                "comment": comment.value,
                "score": score.value,
                "id_user": idUser,
                "id_book": book
            }
            let res = await fetch(url, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(newComment),
            });
            comment.value = "";
            score.value = "5";
            getComments(book);
        } else
            comment.placeholder = "Le falta llenar aquí";
    } catch (error) {
        console.log(error);
    }
}

//------------------------------------  DELETE -----------------------------------------//
async function deleteComment(comment) {
    try {
        let res = await fetch(`${url}/${comment}`, {
            "method": "DELETE",
        });
        if (res.status == 200) {
            getComments(book);
        }
    } catch (error) {
        console.log(error);
    }
}

assignRole();

function assignRole() {
    let roleUser = document.querySelector("#info").getAttribute('dataRoleUser');
    if (roleUser != null) {
        app.role = roleUser;


        let appform = new Vue({
            el: '#commentForm',
            methods: {
                enviarComentario: function() {
                    sendComment();
                }
            }
        })
    } else {
        app.role = "normal";
    }
}