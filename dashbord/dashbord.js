document.addEventListener("DOMContentLoaded", function () {
    // Kodi këtu ekzekutohet vetëm pasi të jetë ngarkuar struktura HTML
    //add fonds
    const addfundsform = document.getElementById('add-funds-form');
    const Addfonds = document.getElementById('Addfonds');
    const formButonContener = document.getElementById('form-buton-contener');
    const addFondsDelet = document.getElementById('add-funds-delet');
    const outlay=document.getElementById('outlay');
    //widthdraw
    const WithdrawForm=document.getElementById('Withdraw-form');
    const WithdrawContener=document.getElementById('Withdraw-contener');
    const Withdraw=document.getElementById('Withdraw');
    const WithdrawDelet=document.getElementById('WithdrawDelet');

    Withdraw.addEventListener("click" , function(){
        WithdrawContener.style.display="flex";
        outlay.style.display="flex";
        document.body.classList.add("blocked");
    });
    WithdrawDelet.addEventListener("click" , function() {
        WithdrawContener.style.display="none";
        outlay.style.display="none";
        document.body.classList.remove("blocked");
    })
    // Event handler për dërgimin e formës
    WithdrawForm .addEventListener('submit', function (e) {
        e.preventDefault(); // Parandalon sjelljen default të formës

        const amount = WithdrawForm .elements["amaunt-input"].value; // Merr vlerën e shumës
        const discription = WithdrawForm .elements["Discription-input"].value.trim(); // Merr vlerën e burimit
        const config = WithdrawForm .elements["conf-input"]; // Merr vlerën e konfigurimit

        let isValid = true; // Flamuri që tregon nëse forma është valide

        // Validim për shumën më të madhe se 7 karaktere
        if (amount > 99999) {
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 7 karaktere!");
            isValid = false;
        }

        const regex = /^[a-zA-Z]+$/;
        if (!regex.test(discription)) {
            alert("Gabim: Burimi përmban karaktere të tjera përveç shkronjave!");
            isValid = false;
        }

        // Nëse validimi është në rregull, dërgo formën
        if (isValid) {
            alert("Të dhënat u shtuan me sukses!");
            addfundsform .submit(); // Dërgon formën manualisht
        }
    });



    // Hapja e formës //add fonds
    Addfonds.addEventListener("click", function () {
        formButonContener.style.display = "flex";
        outlay.style.display="flex";
        document.body.classList.add("blocked");
        
    });

    // Mbyllja e formës
    addFondsDelet.addEventListener("click", function () {
        formButonContener.style.display = "none";
        outlay.style.display="none";
        document.body.classList.remove("blocked");
    });

    // Parandalimi i klikimeve jashtë formës
    formButonContener.addEventListener("click", function (e) {
        e.stopPropagation(); // Parandalon klikimet jashtë container
    });

    // Event handler për dërgimin e formës
    addfundsform .addEventListener('submit', function (e) {
        e.preventDefault(); // Parandalon sjelljen default të formës

        const amount = addfundsform .elements["amaunt-input"].value; // Merr vlerën e shumës
        const source = addfundsform .elements["sourece-input"].value.trim(); // Merr vlerën e burimit
        const config = addfundsform .elements["conf-input"]; // Merr vlerën e konfigurimit
        const Quantity = WithdrawForm.elements["Quantity-input"].value;

        let isValid = true; // Flamuri që tregon nëse forma është valide

        // Validim për shumën më të madhe se 7 karaktere
        if (amount > 99999) {
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 7 karaktere!");
            isValid = false;
        }
        if(Quantity > 99){
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 99!");
            isValid = false;
        }

        const regex = /^[a-zA-Z]+$/;
        if (!regex.test(source)) {
            alert("Gabim: Burimi përmban karaktere të tjera përveç shkronjave!");
            isValid = false;
        }

        // Nëse validimi është në rregull, dërgo formën
        if (isValid) {
            alert("Të dhënat u shtuan me sukses!");
            addfundsform .submit(); // Dërgon formën manualisht
        }
    });
    const hamburgerlogo=document.getElementById('hamburgerlogo');
    const rightcontenier=document.getElementById('rightcontenier');
    const hamburgerContener=document.getElementById('hamburger-contener');
    const hamburgerContenerDelet=document.getElementById('hamburger-contener-delet');
    hamburgerlogo.addEventListener("click" , function(){
        rightcontenier.style.display="none";
        hamburgerContener.style.display="flex";
    })
    hamburgerContenerDelet.addEventListener("click" , function(){
        rightcontenier.style.display="";
        hamburgerContener.style.display="none";
    })
});
