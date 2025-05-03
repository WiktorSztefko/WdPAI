const form = document.querySelector("form");
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const usernameInput = form.querySelector('input[name="username"]');
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');


function isValueCorrect(name) {
    return name != ""
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid')
}

nameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        markValidation(nameInput, isValueCorrect(nameInput.value));
    }, 1000);
});

surnameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        markValidation(surnameInput, isValueCorrect(surnameInput.value));
    }, 1000);
});

usernameInput.addEventListener('keyup', function () {
    setTimeout(function () {
        markValidation(usernameInput, isValueCorrect(usernameInput.value));
    }, 1000);
});

emailInput.addEventListener('keyup', function () {
    setTimeout(function () {
        markValidation(emailInput, isEmail(emailInput.value));
    }, 1000);
});

confirmedPasswordInput.addEventListener('keyup', function () {
    setTimeout(function () {
        const condition = arePasswordsSame(
            passwordInput.value,
            confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition);
    }, 1000);
});

form.addEventListener("submit", e => {
    let isAllCorrect = true;
    const inputs = [nameInput, surnameInput, usernameInput, emailInput, passwordInput, confirmedPasswordInput]
    inputs.forEach(input => {
        const condition = isValueCorrect(input.value)
        markValidation(input, condition)
        if (input.value.trim() === "") 
            isAllCorrect = false;
    });

    if (!isAllCorrect)
        e.preventDefault();
});