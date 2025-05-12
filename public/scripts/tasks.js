const button = document.querySelector("#button-task")
let collection

fetch("/tasks", {
    method: "GET",
    headers: {
        'Content-Type': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (responseJson) {
    collection = responseJson
});

function randomTask() {
    const task = collection[Math.floor(Math.random() * collection.length)];
    button.textContent = task['description_task'];
}

button.addEventListener('click', () => randomTask(collection))


