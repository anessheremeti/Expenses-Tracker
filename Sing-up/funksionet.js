document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signupForm");
    const fullNameError = document.getElementById("error");
    const passwordError = document.getElementById("error-1");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Parandalon dërgimin automatik të formës

        // Merr vlerat e inputeve
        const fullName = form.elements["full-name"].value.trim();
        const password = form.elements["password"].value;
        const confirmPassword = form.elements["Config-password"].value;

        let isValid = true; // Flamuri që tregon nëse forma është valide

        // Pastrimi i mesazheve të gabimit për çdo herë që shtypet submit
        fullNameError.textContent = "";
        passwordError.textContent = "";

        // Kontrollo nëse Full Name ka vetëm shkronja dhe hapësira
        const namePattern = /^[a-zA-Z\s]+$/;
        if (!namePattern.test(fullName)) {
            fullNameError.textContent = "Full Name cannot contain numbers.";
            isValid = false;
        }

        // Kontrollo nëse fjalëkalimi dhe konfirmimi i tij përputhen
        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            isValid = false;
        }

        // Kontrollo gjatësi minimale dhe maksimale për Full Name
        if (fullName.length < 5 || fullName.length > 25) {
            fullNameError.textContent = "Full Name must be between 5 and 25 characters.";
            isValid = false;
        }

        // Kontrollo gjatësi minimale dhe maksimale për Password
        if (password.length < 8 || password.length > 15) {
            passwordError.textContent = "Password must be between 8 and 15 characters.";
            isValid = false;
        }

        // Nëse të gjitha janë të sakta, dërgo formën
        if (isValid) {
            form.submit();
        }
    });
});

