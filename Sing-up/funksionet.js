// Kur të gjitha elementet e faqes janë ngarkuar, ekzekuto këtë funksion
document.addEventListener("DOMContentLoaded", function () {
    // Gjej formularin dhe ruaje në variablën "form"
    const form = document.querySelector("form");
    // Shto një event listener për eventin "submit" të formës
    form.addEventListener("submit", function (e) {
        // Parandalon që forma të dërgohet automatikisht, për të kryer validimet para se të dërgohet
         e.preventDefault(); 
 // Merr dhe ruan vlerat e fushave të formës, duke hequr hapësirat boshe nga fillimi dhe fundi
 const fullName = form.elements["full-name"].value.trim();
 const username = form.elements["name"].value.trim();
 const email = form.elements["email"].value.trim();
 const password = form.elements["password"].value;
 const confirmPassword = form.elements["Config-password"].value;
