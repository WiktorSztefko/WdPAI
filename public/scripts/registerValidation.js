import * as validation from "./validationFunction.js"

const form = document.querySelector("form");
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const usernameInput = form.querySelector('input[name="username"]');
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

nameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(nameInput, validation.isValueCorrect(nameInput.value));
    }, 1000);
});

surnameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(surnameInput, validation.isValueCorrect(surnameInput.value));
    }, 1000);
});

usernameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(usernameInput, validation.isValueCorrect(usernameInput.value));
    }, 1000);
});

emailInput.addEventListener('keyup', function () {
    setTimeout(function () {
        validation.markValidation(emailInput, validation.isEmail(emailInput.value));
    }, 1000);
});

confirmedPasswordInput.addEventListener('keyup', function () {
    setTimeout(function () {
        const condition = validation.arePasswordsSame(
            passwordInput.value,
            confirmedPasswordInput.value
        ) && validation.isValueCorrect(passwordInput.value) && validation.isValueCorrect(confirmedPasswordInput.value);
        validation.markValidation(confirmedPasswordInput, condition);
        validation.markValidation(passwordInput, condition);
    }, 1000);
});

form.addEventListener("submit", e => {
    let isAllCorrect = true;
    const inputs = [nameInput, surnameInput, usernameInput, emailInput, passwordInput, confirmedPasswordInput]
    inputs.forEach(input => {
        const condition = validation.isValueCorrect(input.value)
        validation.markValidation(input, condition)
        if (!condition) 
            isAllCorrect = false;
    });

    if (!isAllCorrect)
        e.preventDefault();
});