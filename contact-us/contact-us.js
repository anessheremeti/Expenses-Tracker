document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contactForm");
    const inputs = form.querySelectorAll("input[required], textarea[required]");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        let isFormValid = true;
    });
});
