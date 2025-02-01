document.addEventListener("DOMContentLoaded", function() {

    const addfundsform = document.getElementById('add-funds-form');
    const Addfonds = document.getElementById('Addfonds');
    let isSubmited = false;
    const formButonContener = document.getElementById('form-buton-contener');
    const addFondsDelet = document.getElementById('add-funds-delet');
    const outlay = document.getElementById('outlay');

    const WithdrawForm = document.getElementById('Withdraw-form');
    const WithdrawContener = document.getElementById('Withdraw-contener');
    const Withdraw = document.getElementById('Withdraw');
    const WithdrawDelet = document.getElementById('WithdrawDelet');

    Withdraw.addEventListener("click", function() {
        WithdrawContener.style.display = "flex";
        outlay.style.display = "flex";
        document.body.classList.add("blocked");
    });
    WithdrawDelet.addEventListener("click", function() {
        WithdrawContener.style.display = "none";
        outlay.style.display = "none";
        document.body.classList.remove("blocked");
    })
    WithdrawForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const amount = document.getElementById("amaunt-input").value;
        const description = document.getElementById("Description-input").value.trim();

        const config = document.getElementById("conf-input");

        let isValid = true;


        if (amount > 99999) {
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 7 karaktere!");
            isValid = false;
        }

        const regex = /^[a-zA-Z]+$/;
        if (!regex.test(discription)) {
            alert("Gabim: Burimi përmban karaktere të tjera përveç shkronjave!");
            isValid = false;
        }


        if (isValid) {
            alert("Të dhënat u shtuan me sukses!");
            WithdrawForm.submit();
        }
    });
    if (isSubmited) {
        return false;
    }



    Addfonds.addEventListener("click", function() {
        formButonContener.style.display = "flex";
        outlay.style.display = "flex";
        document.body.classList.add("blocked");
        isSubmited = true;

    });


    addFondsDelet.addEventListener("click", function() {
        formButonContener.style.display = "none";
        outlay.style.display = "none";
        document.body.classList.remove("blocked");
    });


    formButonContener.addEventListener("click", function(e) {
        e.stopPropagation();
        container
    });


    addfundsform.addEventListener('submit', function(e) {
        e.preventDefault();

        const amount = addfundsform.elements["amaunt-input"].value;
        const source = addfundsform.elements["sourece-input"].value.trim();
        const config = addfundsform.elements["conf-input"];

        let isValid = true;


        if (amount > 99999) {
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 7 karaktere!");
            isValid = false;
        }

        const regex = /^[a-zA-Z]+$/;
        if (!regex.test(source)) {
            alert("Gabim: Burimi përmban karaktere të tjera përveç shkronjave!");
            isValid = false;
        }

        if (isValid) {
            alert("Të dhënat u shtuan me sukses!");
            addfundsform.submit();
        }
    });
    WithdrawForm.addEventListener('submit', function(e) {
        e.preventDefault();
        isSubmited = true;

        const amount = document.getElementById("amaunt-input").value;
        console.log(amount);
        const description = document.getElementById("Description-input").value.trim();
        console.log(description);
        const config = addfundsform.elements["conf-input"];

        let isValid = true;


        if (amount > 99999) {
            alert("Gabim: Shuma nuk duhet të jetë më shumë se 7 karaktere!");
            isValid = false;
        }

        const regex = /^[a-zA-Z]+$/;
        if (!regex.test(description)) {
            alert("Gabim: Burimi përmban karaktere të tjera përveç shkronjave!");
            isValid = false;
        }


        if (isValid) {
            alert("Të dhënat u shtuan me sukses!");
            WithdrawForm.submit();
        }
    });
    const hamburgerlogo = document.getElementById('hamburgerlogo');
    const rightcontenier = document.getElementById('rightcontenier');
    const hamburgerContener = document.getElementById('hamburger-contener');
    const hamburgerContenerDelet = document.getElementById('hamburger-contener-delet');
    hamburgerlogo.addEventListener("click", function() {
        rightcontenier.style.display = "none";
        hamburgerContener.style.display = "flex";
    })
    hamburgerContenerDelet.addEventListener("click", function() {
        rightcontenier.style.display = "";
        hamburgerContener.style.display = "none";
    })
});