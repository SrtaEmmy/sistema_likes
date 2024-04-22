let xhr = new XMLHttpRequest();

// manejar respuesta 
xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {

        let respuestas = JSON.parse(xhr.response);

        if (Array.isArray(respuestas)) {//respuesta de getLikes.php

                respuestas.forEach(respuesta => {
                let likeHTML = document.getElementById(`likes${respuesta.id_image}`);
                likeHTML.textContent = respuesta.likes;
                });

        } else {//respuesta de updateLike.php

                let likeHTML = document.getElementById(`likes${respuestas.id_image}`);
                likeHTML.textContent = respuestas.likes;
        }
    }
}

// solicitud para mostrar likes
const getLikes = () => {
    xhr.open('POST', 'getLikes.php', true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send();
}


// solicitud para dar/quitar like 
const send_like = (id_img) => {
    xhr.open('POST', 'updateLike.php', true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send(`idImage=${id_img}`);

};


document.addEventListener('DOMContentLoaded', () => {
    getLikes();
});
