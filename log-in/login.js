document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login_form");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const errorElement = document.getElementById("error");

    form.addEventListener("submit", function (event) {
        let isFormValid = true;
        let errorMessage = "";

        if (username.value.trim() === "") {
            username.style.borderColor = "red";
            errorMessage += "Username is required.\n";
            isFormValid = false;
        } else {
            username.style.borderColor = "green";
        }

        if (password.value.trim() === "") {
            password.style.borderColor = "red";
            errorMessage += "Password is required.\n";
            isFormValid = false;
        } else if (password.value.length <= 8) {
            password.style.borderColor = "red";
            errorMessage += "Password must be longer than 8 characters.\n";
            isFormValid = false;
        } else {
            password.style.borderColor = "green";
        }

        if (!isFormValid) {
            event.preventDefault(); 
            errorElement.innerText = errorMessage.trim();
            errorElement.style.display = "block";
            errorElement.style.color = "red";
        } else {
            errorElement.style.display = "none";
        }
    });

    username.addEventListener("input", function () {
        if (username.value.trim() === "") {
            username.style.borderColor = "red";
        } else {
            username.style.borderColor = "green";
        }
    });

    password.addEventListener("input", function () {
        if (password.value.trim() === "" || password.value.length <= 8) {
            password.style.borderColor = "red";
        } else {
            password.style.borderColor = "green";
        }
    });
});
