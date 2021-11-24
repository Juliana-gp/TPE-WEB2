"use strict"
const url = "api/comentarios";

//let book = document.querySelector("#info").dataset.Book;
//let idUser = document.querySelector("#info").dataset.IdUser;
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
        },
        getOrdenados: function(params, ord) {
            getCommentsOrdenados(book, params, ord);
        }
    }
})


//----------------------------------  GET  -----------------------------------//
async function getCommentsOrdenados(book, params, ord) {
    try {
        let res = await fetch(url + "?book=" + book + "&orderby=" + params + "&order=" + ord);
        //console.log(res);
        if (res.status == 200) {
            let json = await res.json();
            app.comments = json;
        } else {
            app.comments = [];
        }
    } catch (e) {
        console.log(e);
    }
}


//----------------------------------  GET  -----------------------------------//
async function getComments(book) {
    try {
        let res = await fetch(url + "?book=" + book);
        if (res.status == 200) {
            let json = await res.json();
            app.comments = json;
        } else {
            app.comments = [];
        }
    } catch (e) {
        console.log(e);
    }
}


//------------------------------------  ADD / POST -----------------------------------------//
async function sendComment() {
    try {
        let comment = document.querySelector("#comment");
        let form = document.querySelector("#newComment");
        let formData = new FormData(form);
        let score = formData.get('score');

        if (comment.value != "") {
            let newComment = {
                "comment": comment.value,
                "score": score,
                "id_user": idUser,
                "id_book": book
            }
            let res = await fetch(url, {
                "method": "POST",
                "mode": "cors",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(newComment),
            });
            comment.value = "";
            console.log(newComment);

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
        } else
            getComments(book);

    } catch (error) {
        console.log(error);
    }
}



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
assignRole();