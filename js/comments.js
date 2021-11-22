loadComments();

async function loadComments() {
    let c = await fetch('api/comments/')
    .then(response => response.json())
    .then(comments => {
        console.log(comments);
        document.getElementById('commentsContainer').innerHTML = comments;
    })
    .catch(error => console.log(error));
    console.log(c);
}