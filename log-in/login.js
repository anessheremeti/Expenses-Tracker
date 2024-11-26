document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("login_form");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const errorElement = document.getElementById('error');
    const inputs = form.querySelectorAll("input[required]");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        let isFormValid = true;
        let messages = [];

        if (username.value.trim() === "") {
            username.style.borderColor = "red";
            messages.push("Username is required.");
            isFormValid = false;
        } else {
            username.style.borderColor = "green";
        }

        if (password.value.trim() === "") {
            password.style.borderColor = "red";
            messages.push("Password is required.");
            isFormValid = false;
        } else if (password.value.length <= 8) {
            password.style.borderColor = "red";
            messages.push("Password must be longer than 8 characters.");
            isFormValid = false;
        } else if (password.value.length >= 12) {
            password.style.borderColor = "red";
            messages.push("Password must be less than 12 characters.");
            isFormValid = false;
        } else {
            password.style.borderColor = "green";
        }

    

        if (messages.length > 0) {
            errorElement.innerText = messages.join("\n");
            errorElement.style.display = "block";
        } else {
            errorElement.style.display = "none";
            alert("Form Submitted Successfully!");
            window.location.href = ""; 
        }
    });

});