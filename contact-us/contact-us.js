document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contactForm");
    const inputs = form.querySelectorAll("input[required], textarea[required]");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        let isFormValid = true;

        inputs.forEach(input => {
            if (input.value.trim() === "") {
                input.style.borderColor = "red"; 
                isFormValid = false;
            } else {
                input.style.borderColor = "green"; 
            }
        });

        if (isFormValid) {
            alert("Your message was submitted successfully!");
            window.location.href = "index.html"; 
        }

    });
    inputs.forEach(input => {
        const label = input.closest(".form-field").querySelector("label");
        const asterisk = label.querySelector(".required");
        if (asterisk) {
            asterisk.style.color = "red"; 
        }


        input.addEventListener("input", function() {
            if (input.value.trim() === "") {
                input.style.borderColor = "red";
            } else {
                input.style.borderColor = "green";
            }
        });
    });

});

