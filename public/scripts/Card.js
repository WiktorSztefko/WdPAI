cocktailsList = ["old fashioned", "lynchburg lemonade", "basil smash", "amf", "aperol spritz", "sangria", "mojito", "blue kamikaze",
    "negroni", "el diablo", "rashberry margarita", "paloma", "spicy margarita", "michelada", "aviaton", "rusty nail", "bellini", "mai tai",
    "corona sunrise", "vodka soda", "rob roy", "malibu mojito", "tequila sunrise", "white russian", "rum old fashioned",
    "malibu spritz", "martini", "m one", "manhattan", "black velvet", "gin and tonic", "tokio ice tea", "cuba libre", "frappe coco baileys",
    "darth jager", "cosmopolitan", "jager shot", "zombie", "long island ice tea", "mimosa", "margarita", "ramos gin fizz",
    "bloody mary", "jager redbull", "pina colada", "irish coffe", "penicillin", "screwdriver", "daiquri", "mad dog", "pisco sour", "hunter's tea"
]

alcoholsList = ["gin", "rum", "whisky", "wódka", "likier", "tequila", "piwo", "wino", "brandy", "mezcal",
    "cachaca", "pisco"
]

class Card{
    static create(array, path){
        const container = document.querySelector('.cards')

        array.forEach(item => {
            let a = document.createElement('a')
            a.href = `item?name=${item}`

            let figure = document.createElement('figure')
            figure.classList.add('card')
            figure.classList.add('hover-effect')

            let img = document.createElement('img')
            img.src = `${path}/${item}.jpeg`

            let figcaption = document.createElement('figcaption')
            figcaption.textContent = item

            figure.appendChild(img)
            figure.appendChild(figcaption)
            a.appendChild(figure)
            container.appendChild(a)
        });
    }
}

let path = window.location.pathname;
let pathParts = path.split('/');
let lastSegment = pathParts.pop();

const list = lastSegment === "cocktails" ? cocktailsList : alcoholsList;
const imagePath = lastSegment === "cocktails" ? "public/images/coctails" : "public/images/alcohols";
Card.create(list, imagePath);
