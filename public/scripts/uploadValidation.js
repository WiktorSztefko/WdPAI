import * as validation from "./validationFunction.js"

const form = document.querySelector("form");
const nameInput = form.querySelector('input[name="name"]');
const descriptionInput = form.querySelector('textarea[name="description"]');
const preparationInstructionInput = form.querySelector('textarea[name="preparationInstruction"]');
const difficultyLevelSelect = form.querySelector('select[name="difficultyLevel"]');
const fileInput = form.querySelector('input[name="file"]');
const fileP = form.querySelector('#file-name');
const ingredientsAddButton = form.querySelector('#ingredients-add-button');

nameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(nameInput, validation.isValueSelected(nameInput.value));
    }, 1000);
});

descriptionInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(descriptionInput, validation.isValueSelected(descriptionInput.value));
    }, 1000);
});

preparationInstructionInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(preparationInstructionInput, validation.isValueSelected(preparationInstructionInput.value));
    }, 1000);
});


ingredientsAddButton.addEventListener('click', function () {
    let ingredientsList = form.querySelector('#ingredients-list');
    let ingredientsDiv = form.querySelector('#ingredients-div');
    validation.markValidation(ingredientsDiv, validation.isValueSelected(ingredientsList.innerHTML.trim()));
});

fileInput.addEventListener('change', function(){
    validation.markValidation(fileP, validation.isValueSelected(fileInput.value));
})

difficultyLevelSelect.addEventListener('change', function () {
    validation.markValidation(difficultyLevelSelect, validation.isValueSelected(difficultyLevelSelect.value));
})

form.addEventListener("submit", e => {
    let isAllCorrect = true
    let condition
    
    const inputs = [
        nameInput,
        descriptionInput,
        preparationInstructionInput,
        fileInput
    ];

    inputs.forEach(input => {
        condition = validation.isValueSelected(input.value)
        validation.markValidation(input, condition)
        if (!condition) isAllCorrect = false;
    });

    condition = validation.isValueSelected(difficultyLevelSelect.value)
    validation.markValidation(difficultyLevelSelect, condition );
    if (!condition) isAllCorrect = false;

    condition = validation.isValueSelected(fileInput.value)
    validation.markValidation(fileP, condition)
    if (!condition) isAllCorrect = false;

    let ingredientsList = form.querySelector('#ingredients-list');
    let ingredientsDiv = form.querySelector('#ingredients-div');

    condition = validation.isValueSelected(ingredientsList.innerHTML.trim())
    validation.markValidation(ingredientsDiv, condition)
    if (!condition) isAllCorrect = false;

    let ingredientsLineCollection = document.querySelectorAll('#ingredients-list select, #ingredients-list input');
    ingredientsLineCollection.forEach(item => {
        condition = validation.isValueSelected(item.value)
        validation.markValidation(item, condition)
        if (!condition) isAllCorrect = false;
 
        item.addEventListener('change', function(){
            condition = validation.isValueSelected(item.value)
            validation.markValidation(item, condition)
        })
    });
   
    if (!isAllCorrect) e.preventDefault();
});