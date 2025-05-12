export function isValueCorrect(name) {
    return name.length >= 3
}

export function isValueSelected(name) {
    return name != ""
}

export function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

export function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

export function markValidation(element, condition) {
    element.classList.toggle('no-valid', !condition);
}