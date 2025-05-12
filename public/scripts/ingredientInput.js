const button = document.querySelector("#ingredients-add-button")
const ingredientsList = document.querySelector("#ingredients-list")
let ingredientsData

fetch("/ingredients", {
    method: "GET",
    headers: {
        'Content-Type': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (responseJson) {
    ingredientsData = responseJson
});

fetch("/units", {
    method: "GET",
    headers: {
        'Content-Type': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (responseJson) {
    unitsData = responseJson
});

function create(ingredientsData) {
    const template = document.querySelector("#ingredient-template")
    const clone = template.content.cloneNode(true)
    const selects = clone.querySelectorAll("select")

    populateSelect(ingredientsData, selects[0], 'name_ingredient', 'id_ingredient');
    populateSelect(unitsData, selects[1], 'name_unit', 'id_unit');
  
    const deleteButton = clone.querySelector(".delete-button");

    deleteButton.addEventListener('click', function(){
        const parent = this.parentElement
        parent.remove()
    })

    ingredientsList.appendChild(clone);
}

function populateSelect(data, selectElement, labelKey, valueKey) {
    data.forEach(item => {
        const option = document.createElement('option');
        option.textContent = item[labelKey];
        option.value = item[valueKey];
        selectElement.appendChild(option);
    });
}

button.addEventListener('click', () => create(ingredientsData));
