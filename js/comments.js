// loadComments();
// 0: {id: '1', comment: 'Hola mundo, first comment!', mueble_id: '1', user_id: '5', user_mail: 'asd', …} length: 1

let url = "api/comments";

async function loadComments(postId) {
  let data;
  let admin = document.getElementById("isAdmin").value;
  console.log(1 == '1');
  console.log(admin);
  let c = await fetch(`${url}/all/${postId}`);
  data = await c.json();
  // document.getElementById('commentsContainer').innerHTML = data;
  console.log(data);

  for (let i = 0; i < data.length; i++) {
    document.getElementById(
      "commentsContainer"
    ).innerHTML += `<div class="comment" id="comment${data[i]['id']}">
        <h3>${data[i]["user_mail"]} valoró: ${data[i]["puntaje"]}/5</h3>
        <p>${data[i]["comment"]}</p>`;

    if (admin == 1) {
      document.getElementById("commentsContainer").innerHTML += `
        <button id="buttonDel${data[i]["id"]}" onclick="deleteComment(${data[i]["id"]})">Borrar comentario</a>
        <button id="buttonUpd${data[i]["id"]}" onclick="updateComment(${data[i]["id"]})">Editar comentario</a>`;
    }

    document.getElementById("commentsContainer").innerHTML += `</div>`;
  }
}

document.getElementById("sendComment").addEventListener("click", sendComment);

function sendComment() {
  let text = document.getElementById("comment").value;
  let puntaje = parseInt(document.getElementById("puntaje").value);
  let muebleId = document.getElementById("muebleId").value;
  let userMail = document.getElementById("userMail").value;

  let post = {
    comment: text,
    mueble_id: muebleId,
    user_mail: userMail,
    puntaje: puntaje,
  };

  fetch(url, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(post),
  })
    .then((response) => {
      console.log(response);
      if (!response.ok) {
        console.log("Error");
      }
      else {
        document.getElementById("commentsContainer").innerHTML = "";
        loadComments(muebleId);
        document.getElementById('comment').value = "";
      }
      return response.json();
    })
    .catch((error) => console.log(error));   
}

function deleteComment(id) {
  let apiUrl = url + "/" + id;
  // console.log(apiUrl);

  fetch(apiUrl, {
    method: "DELETE",
  })
    .then((response) => {
      console.log(response);
      if (!response.ok) {
        console.log("Error");
      }
      else {
          document.getElementById(`comment${id}`).remove();
          document.getElementById(`buttonDel${id}`).remove();
          document.getElementById(`buttonUpd${id}`).remove();
      }
    })
    .catch((error) => console.log(error));
}

function updateComment(id) {
    let text = document.getElementById("comment").value;
    let puntaje = parseInt(document.getElementById("puntaje").value);
    let muebleId = parseInt(document.getElementById("muebleId").value);
    let userMail = document.getElementById("userMail").value;
  
    let post = {
      comment: text,
      mueble_id: muebleId,
      user_mail: userMail,
      puntaje: puntaje,
    }; console.log(post);

    let apiUrl = url + "/" + id;
  
    fetch(apiUrl, {
      method: "PUT",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(post),
    })
      .then((response) => {
        console.log(response);
        if (!response.ok) {
          console.log("Error");
        }
        else {
            document.getElementById(`comment${id}`).innerHTML = `
          <h3>${userMail} valoró: ${puntaje}/5</h3>
          <p>${text}</p>`;
        }
      })
      .catch((error) => console.log(error));
  }