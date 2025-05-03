
const button = document.querySelector("#ingredients-add-button")
const ingredientsList = document.querySelector("#ingredients-list")

function create(ingredientsData) {
    const template = document.querySelector("#ingredient-template")
    const clone = template.content.cloneNode(true)
    const selects = clone.querySelectorAll("select")


    ingredientsData.forEach(ingredient => {
        let option = document.createElement('option')
        option.textContent = ingredient['name_ingredient']
        option.value = ingredient['id_ingredient']
        selects[0].appendChild(option)
    });

    unitsData.forEach(unit => {
        let option = document.createElement('option')
        option.textContent = unit['name_unit']
        option.value = unit['id_unit']
        selects[1].appendChild(option)
    });
  
    const deleteButton = clone.querySelector(".delete-button");

    deleteButton.addEventListener('click', function(){
        const parent = this.parentElement
        parent.remove()
    })

    ingredientsList.appendChild(clone);
}

button.addEventListener('click', () => create(ingredientsData));
