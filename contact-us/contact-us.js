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
});
