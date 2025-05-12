const likeButton = document.querySelector(".fa-heart");
const likes = document.querySelector("#likes-count");
const container = likes.parentElement;
const id = container.getAttribute("id");
const data = { 'id': id };

fetch(`/userLikesCocktail`,{
    method: "POST",
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
})
.then(function (res) {
    return res.json();
})
.then(function (data) {
    likeButton.classList.toggle('fa-solid', data.liked);
    likeButton.classList.toggle('fa-regular', !data.liked);
})

function giveLike() {
    fetch(`/like`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (res) {
            return res.json();
    }).then(function (resJson) {
            const liked = resJson.liked;
            likes.innerHTML = parseInt(likes.innerHTML) + (liked ? 1 : -1);
            likeButton.classList.toggle('fa-solid', liked);
            likeButton.classList.toggle('fa-regular', !liked);
    })
}

likeButton.addEventListener("click", giveLike);

