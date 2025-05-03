const input = document.querySelector('#file-upload')
const fileNameDisplay = document.querySelector("#file-name")

input.addEventListener("change", function () {
    const fileName = this.files[0] ? this.files[0].name : "Nie wybrano pliku"
    fileNameDisplay.textContent = fileName;
});


