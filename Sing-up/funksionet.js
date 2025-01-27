document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signupForm");
    const fullNameError = document.getElementById("error");
    const passwordError = document.getElementById("error-1");

    form.addEventListener("submit", function(e) {
        e.preventDefault();


        const fullName = form.elements["full-name"].value.trim();

        const password = form.elements["password"].value;

        console.log(password);
        const confirmPassword = form.elements["Config-password"].value;

        let isValid = true;

        fullNameError.textContent = "";
        passwordError.textContent = "";




        const namePattern = /^[a-zA-Z\s]+$/;
        if (!namePattern.test(fullName)) {
            fullNameError.textContent = "Full Name cannot contain numbers.";
            isValid = false;
        }



        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            isValid = false;
        }


        if (fullName.length < 5 || fullName.length > 25) {
            fullNameError.textContent = "Full Name must be between 5 and 25 characters.";
            isValid = false;
        }


        if (password.length < 8 || password.length > 15) {
            passwordError.textContent = "Password must be between 8 and 15 characters.";
            isValid = false;
        }


        if (isValid) {
            form.submit();
        }
    });
});