document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contactForm");
    const inputs = form.querySelectorAll("input[required], textarea[required]");
    const fullNameInput = document.getElementById("name");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        let isFormValid = true;

        if (fullNameInput.value.trim() === "" || /[0-9]/.test(fullNameInput.value)) {
            fullNameInput.style.borderColor = "red"; 
            isFormValid = false;
        } else {
            fullNameInput.style.borderColor = "green"; 
        }

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
            console.log(window.location)
            window.location.href = "../"; 
        }

    });

    fullNameInput.addEventListener("input", function() {
        if (/[0-9]/.test(fullNameInput.value)) {
            fullNameInput.style.borderColor = "red";
            fullNameInput.value = fullNameInput.value.replace(/[0-9]/, "");
        } else {
            fullNameInput.style.borderColor = "green";
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

