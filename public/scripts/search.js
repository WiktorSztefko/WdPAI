const search = document.querySelector('#search-input');
const cocktailsContainer = document.querySelector(".cards");
const defaultHTML = cocktailsContainer.innerHTML

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        if (!this.value){
            cocktailsContainer.innerHTML = defaultHTML
            return
        }

        const data = { search: this.value };

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            cocktailsContainer.innerHTML = "";
            loadCocktails(projects)
        });
    }
});

function loadCocktails(cocktails) {
    cocktails.forEach(cocktail => {
        createCocktail(cocktail);
    });
}

function createCocktail(cocktail) {
    const template = document.querySelector("#cocktail-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href =`cocktail?name=${cocktail.name}`
    const image = clone.querySelector("img");
    image.src = `public/images/cocktails/${cocktail.image}`;
    const figcaption = clone.querySelector("figcaption");
    figcaption.textContent = cocktail.name;

    cocktailsContainer.appendChild(clone);
}